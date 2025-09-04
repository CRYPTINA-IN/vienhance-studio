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
            'Gurugram',
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

                $prompt = "Generate an 800–900 word SEO-optimized landing page targeting '{$title}'.\n\nThe page should include:\n1. Hero intro (what we do for {$city} clients for {$service->title}, written naturally).\n2. About/Service overview tailored to {$service->title} with clear deliverables, practical examples, and semantically related subtopics.\n3. Process (3–5 concise stages) relevant to {$service->title}.\n4. Benefits as bullet list for {$city} businesses (include local relevance).\n5. Portfolio highlights (mention clients in {$city} or Pan India).\n6. Why Choose Us (local relevance to {$city}, with proof of understanding the local culture and industries).\n7. FAQs (3–4) about {$service->title}.\n8. CTA encouraging consultation in {$city}.\n\nDynamicity & SEO Guidelines:\n- Dynamically weave in micro-locations, cultural spots, and well-known business districts of {$city} (e.g., for Dehradun: Rajpur Road, Ghanta Ghar, IT Park, Clement Town).\n- Mention 2–3 industries, institutions, or sectors that are strong in {$city} (e.g., tourism, education, IT, startups, manufacturing).\n- Highlight local business pain points and explain how {$service->title} solves them.\n- Where relevant, include subtle references to nearby hubs or satellite cities that connect with {$city}'s business ecosystem.\n- Incorporate synonyms and semantically related terms naturally for {$service->title}.\n- Write in a mix of sentence lengths; occasional conversational phrases to sound human.\n- Include subtle storytelling or examples relevant to {$city}.\n- Keep the tone professional but approachable, as if written by an expert consultant who knows {$city} well.\n\nRequirements:\n- 800–900 words\n- Natural keyword usage around {$service->title} + {$city} with variations and nearby areas\n- Use H2/H3 headings only\n- Proper <p>, <ul>, <li>, <strong> formatting\n\nTone and angle guidance: {$serviceTone}";

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

                    // Build final page content, appending a standardized FAQ section if provided
                    $finalContent = $aiData['page_content'] ?? '';
                    if (isset($aiData['faqs']) && is_array($aiData['faqs']) && ! empty($aiData['faqs'])) {
                        $accordionId = Str::slug($slug);
                        $faqTitle = "FAQ's";
                        $faqSubtitle = "Everything you <span>need to know</span>";
                        $finalContent .= "\n" . $this->renderFaqsSection($aiData['faqs'], $accordionId, $faqTitle, $faqSubtitle);
                    }

                    $seoPage = SeoPage::updateOrCreate(
                        ['slug' => $slug],
                        [
                            'title' => $aiData['page_title'] ?? $title,
                            'subtitle' => $aiData['subtitle'] ?? null,
                            'description' => $aiData['meta_description'] ?? $description,
                            'featured_image' => $service->image ?? null,
                            'content' => $finalContent,
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
7. FAQs as an array of objects with 'question' and 'answer' fields (3–4 items)

Format the response as valid JSON with these keys: page_title, subtitle, meta_description, page_content, target_keywords, seo_summary, faqs

Make sure the content is:
- Engaging and informative
- SEO-friendly with proper heading structure (H2, H3). Do not include any H1 heading in the content because the page already renders the title in an H1.
- The page_title must NOT include brand or site suffixes, or pipes like \"| Vienhance\". Only return the pure page title.
- Includes the target keywords naturally
- Well-structured with paragraphs, lists, and formatting
- Professional and relevant to the page topic

Important separation rule:
- Do NOT include an FAQ section inside page_content. Return FAQs only in the 'faqs' array as structured data; the system will render the FAQ section using a standardized template.

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
     * Render FAQs HTML matching the our-faqs-section.blade.php structure
     */
    protected function renderFaqsSection(array $faqs, string $accordionId, string $title, string $subtitle): string
    {
        // Sanitize and limit FAQs to reasonable count
        $faqs = array_values(array_filter($faqs, function ($item) {
            return is_array($item) && isset($item['question'], $item['answer']) && $item['question'] !== '' && $item['answer'] !== '';
        }));

        if (empty($faqs)) {
            return '';
        }

        // Build FAQ items
        $itemsHtml = '';
        foreach ($faqs as $index => $faq) {
            $delayAttr = $index > 0 ? ' data-wow-delay="' . ($index * 0.2) . 's"' : '';
            $q = e($faq['question']);
            $a = e($faq['answer']);
            $itemsHtml .= "\n                                <div class=\"accordion-item wow fadeInUp\"{$delayAttr}>
                                    <h2 class=\"accordion-header\" id=\"heading-{$accordionId}-{$index}\">
                                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\"
                                            data-bs-target=\"#collapse-{$accordionId}-{$index}\" 
                                            aria-expanded=\"false\" 
                                            aria-controls=\"collapse-{$accordionId}-{$index}\">{$q}</button>
                                    </h2>
                                    <div id=\"collapse-{$accordionId}-{$index}\" 
                                         class=\"accordion-collapse collapse\" 
                                         aria-labelledby=\"heading-{$accordionId}-{$index}\"
                                         data-bs-parent=\"#faq-accordion-{$accordionId}\">
                                        <div class=\"accordion-body\">
                                            <p>{$a}</p>
                                        </div>
                                    </div>
                                </div>";
        }

        // Wrap in full section structure
        $html = "<div class=\"our-faqs\">\n    <div class=\"container\">\n        <div class=\"row section-row align-items-center\">\n            <div class=\"col-lg-9\">\n                <div class=\"section-title\">\n                    <h3 class=\"wow fadeInUp\">" . e($title) . "</h3>\n                    <h2 class=\"text-anime-style-2\" data-cursor=\"-opaque\">{$subtitle}</h2>\n                </div>\n            </div>\n        </div>\n        <div class=\"row align-items-center\">\n            <div class=\"col-lg-6\">\n                <div class=\"our-faq-section\">\n                    <div class=\"faq-accordion\" id=\"faq-accordion-{$accordionId}\">{$itemsHtml}\n                    </div>\n                </div>\n            </div>\n            <div class=\"col-lg-6\">\n                <div class=\"our-faqs-img\">\n                    <figure class=\"image-anime reveal\">\n                        <img src=\"images/our-faq-img.png\" alt=\"FAQ Image\">\n                    </figure>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>";

        return "\n<div class=\"content-section wow fadeInUp\" data-wow-delay=\"0.2s\">\n{$html}\n</div>\n";
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



