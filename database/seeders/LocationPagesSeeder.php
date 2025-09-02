<?php

namespace Database\Seeders;

use App\Models\SeoPage;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Prism;

class LocationPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filterEnv = env('SEO_PAGE_FILTER_TITLES');
        $filterTitles = collect([]);
        if (! empty($filterEnv)) {
            $filterTitles = collect(explode('|', $filterEnv))->map(fn ($t) => trim($t))->filter();
            $this->command?->info('Filtering titles: ' . $filterTitles->implode(', '));
        }

        $locations = [
            'Delhi',
            'Haridwar',
            'Dehradun',
            'Jaipur',
            'Mumbai',
        ];

        $services = Service::active()->ordered()->get();

        foreach ($locations as $city) {
            foreach ($services as $service) {
                $title = "{$service->title} in {$city}";
                $description = Str::limit("{$service->description} Serving clients in {$city} with a focus on measurable outcomes and exceptional design.", 160);

                if ($filterTitles->isNotEmpty() && ! $filterTitles->contains($title)) {
                    continue;
                }
                $keywords = Str::of($service->slug)->replace('-', ' ')
                    ->append(" {$city}, ", $service->title, ", best agency {$city}, studio {$city}, services {$city}")
                    ->toString();
                // Service-specific tone/instruction
                $serviceTone = match (true) {
                    str_contains($service->slug, 'ui-ux') => 'Emphasize usability, accessibility, research, prototyping, and digital product outcomes.',
                    str_contains($service->slug, 'branding') => 'Emphasize visual identity, messaging, consistency, differentiation, and storytelling across touchpoints.',
                    str_contains($service->slug, 'print') => 'Emphasize marketing collateral, print production readiness, readability, and campaign impact across mediums.',
                    str_contains($service->slug, 'illustration') => 'Emphasize visual storytelling, bespoke iconography, style fit, and engagement.',
                    str_contains($service->slug, '3d') || str_contains($service->slug, 'motion') => 'Emphasize animation, product visualization, storyboarding, rendering, and dynamic brand moments.',
                    default => 'Emphasize measurable outcomes and clear business value.',
                };

                $prompt = "Generate a 800–900 word SEO-optimized landing page targeting '{$title}'. \n            The page should include:\n            1. Hero intro (what we do for {$city} clients for {$service->title}).\n            2. About/Service overview tailored to {$service->title} with deliverables.\n            3. Process (3–5 concise stages) relevant to {$service->title}.\n            4. Benefits as bullet list for {$city} businesses.\n            5. Portfolio highlights (mention clients in {$city} or Pan India).\n            6. Why Choose Us (local relevance to {$city}).\n            7. FAQs (3–4) about {$service->title}.\n            8. CTA encouraging consultation in {$city}.\n            Tone and angle guidance: {$serviceTone}\n            Requirements:\n            - 800–900 words\n            - Natural keyword usage around {$service->title} + {$city}\n            - Use H2/H3 headings only\n            - Tone: professional, approachable\n            - Proper <p>, <ul>, <li>, <strong> formatting";

                $aiPayload = $this->buildPrompt($title, $description, $keywords, $prompt);

                try {
                    if (empty(config('prism.providers.gemini.api_key')) || config('prism.providers.gemini.api_key') === 'your_gemini_api_key_here') {
                        $this->command?->error('Gemini API Key Not Configured');
                        return;
                    }

                    $response = Prism::text()
                        ->using(Provider::Gemini, 'gemini-2.0-flash')
                        ->withPrompt($aiPayload)
                        ->asText();

                    $aiContent = $response->text ?? null;
                    if (! $aiContent) {
                        $this->command?->error("AI generation failed for {$title}");
                        continue;
                    }

                    // Log raw AI output for debugging when needed
                    Log::info("AI raw response for {$title}", ['response' => $aiContent]);

                    $aiData = $this->parseAiJson($aiContent);
                    if (! $aiData) {
                        $this->command?->error("Invalid JSON from AI for {$title}");
                        continue;
                    }

                    // Force consistent slug: service-slug + city
                    $slug = Str::slug("{$service->slug}-{$city}");

                    $seoPage = SeoPage::updateOrCreate(
                        ['slug' => $slug],
                        [
                            'title' => $aiData['page_title'] ?? $title,
                            'subtitle' => $aiData['subtitle'] ?? null,
                            'description' => $aiData['meta_description'] ?? $description,
                            'featured_image' => $service->image ?? null,
                            'content' => $aiData['page_content'] ?? '',
                            'target_keywords' => $aiData['target_keywords'] ?? $keywords,
                            'seo_summary' => $aiData['seo_summary'] ?? null,
                            'is_active' => true,
                            'is_ai_generated' => true,
                            'ai_prompt' => $aiPayload,
                            'published_at' => now(),
                        ]
                    );

                    $this->command?->info("✅ Inserted/Updated page: {$title} (ID: {$seoPage->id})");

                    // Gentle rate limit between AI calls (1.5s)
                    usleep(1500 * 1000);
                } catch (\Throwable $e) {
                    $this->command?->error("Error for {$title}: " . $e->getMessage());
                    Log::error('LocationPagesSeeder error', ['title' => $title, 'error' => $e->getMessage()]);
                }
            }
        }
    }

    /**
     * Build AI prompt wrapper
     */
    protected function buildPrompt(string $title, string $description, ?string $keywords, ?string $prompt): string
    {
        return "Please generate comprehensive page content for the following:

Page Title: {$title}
Page Description: {$description}
Target Keywords: {$keywords}
Additional Instructions: {$prompt}

Please provide the following in JSON format:
1. Page Title (optimized for SEO)
2. Page Subtitle (engaging subtitle)
3. Meta Description (150-160 characters, SEO optimized)
4. Page Content (comprehensive HTML content with proper headings, paragraphs, and structure)
5. Target Keywords (comma-separated, based on content)
6. SEO Summary (brief summary of SEO optimization)

Format the response as valid JSON with these keys: page_title, subtitle, meta_description, page_content, target_keywords, seo_summary

Make sure the content is:
- Engaging and informative
- SEO-friendly with proper heading structure (H2, H3). Do not include any H1 heading in the content because the page already renders the title in an H1.
- The page_title must NOT include brand or site suffixes, or pipes like \"| Vienhance\". Only return the pure page title.
- Includes the target keywords naturally
- Well-structured with paragraphs, lists, and formatting
- Professional and relevant to the page topic

Front-end structure and classes requirements for page_content:
- Return ONLY the inner HTML intended for the page body (no <html>, <head>, or layout wrappers). It will be injected inside a container with class 'post-entry'.
- Use <h2> and <h3> headings only. The first main section heading should be <h2 class=\"text-anime-style-2 wow fadeInUp\" data-wow-delay=\"0.1s\">...</h2> to match site styling.
- Wrap each major section (Hero intro, About/Services, Portfolio highlights, Why Choose Us, Testimonials, CTA, Contact) in a <div class=\"content-section wow fadeInUp\" data-wow-delay=\"0.2s\">...</div> block for consistent animations.
- Use semantic <p>, <ul>, <li>, and <strong> tags for text and lists. Avoid inline styles.
- Where appropriate, use <ul class=\"list-unstyled\"> for bullet lists and concise <li> items.
- Do NOT include images, scripts, iframes, or external CSS.

Personal CTA requirements:
- Use the site contact email exactly as shown on the contact page: Hello@vienhancestudio.com
- End with a CTA block like:
  <div class=\"cta-box wow fadeInUp\" data-wow-delay=\"0.4s\">
    <p><strong>Ready to start?</strong> Email us at <a href=\"mailto:Hello@vienhancestudio.com\">Hello@vienhancestudio.com</a> or <a href=\"/contact\">reach out via our contact page</a> to discuss your project in {$title}.</p>
  </div>";
    }

    /**
     * Extract JSON object from a possibly verbose AI response and return array.
     */
    protected function parseAiJson(string $response): ?array
    {
        $start = strpos($response, '{');
        $end = strrpos($response, '}');

        if ($start !== false && $end !== false && $end >= $start) {
            $json = substr($response, $start, $end - $start + 1);
            $data = json_decode($json, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
                return $data;
            }
        }

        if (preg_match('/\{.*\}/s', $response, $matches)) {
            $json = $matches[0];
            $data = json_decode($json, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
                return $data;
            }
        }

        return null;
    }
}



