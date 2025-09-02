<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Prism;

class GenerateSeoContent extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'generate_seo_content';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Generate SEO Content')
            ->icon('heroicon-o-sparkles')
            ->color('success')
            ->form([
                TextInput::make('title')
                    ->label('Content Title')
                    ->required()
                    ->placeholder('Enter the title of your content'),

                Textarea::make('content')
                    ->label('Content')
                    ->required()
                    ->placeholder('Enter your content to generate SEO from')
                    ->rows(5),

                TextInput::make('target_keywords')
                    ->label('Target Keywords')
                    ->placeholder('Enter target keywords (comma separated)')
                    ->helperText('Optional: Specific keywords you want to target'),
            ])
            ->action(function (array $data): void {
                $this->generateSeoContent($data);
            });
    }

    protected function generateSeoContent(array $data): void
    {
        try {
            // Check if Gemini API key is configured
            if (empty(config('prism.providers.gemini.api_key')) || config('prism.providers.gemini.api_key') === 'your_gemini_api_key_here') {
                Notification::make()
                    ->title('Gemini API Key Not Configured')
                    ->body('Please set your GEMINI_API_KEY in the .env file to use AI content generation.')
                    ->warning()
                    ->send();

                return;
            }

            $prompt = $this->buildSeoPrompt($data);

            $response = Prism::text()
                ->using(Provider::Gemini, 'gemini-2.0-flash')
                ->withPrompt($prompt)
                ->asText();

            $seoContent = $this->parseSeoResponse($response->text);

            // Show the generated content in a notification
            $this->showGeneratedContent($seoContent);

        } catch (\Exception $e) {
            Notification::make()
                ->title('Error Generating SEO Content')
                ->body('There was an error generating the SEO content: '.$e->getMessage())
                ->danger()
                ->send();
        }
    }

    protected function buildSeoPrompt(array $data): string
    {
        $title = $data['title'];
        $content = $data['content'];
        $keywords = $data['target_keywords'] ?? '';

        return "Please generate SEO-optimized content for the following:

Title: {$title}
Content: {$content}
Target Keywords: {$keywords}

Please provide the following in JSON format:
1. Meta Title (50-60 characters)
2. Meta Description (150-160 characters)
3. Meta Keywords (comma-separated)
4. SEO-optimized excerpt (2-3 sentences)
5. Suggested social media title
6. Suggested social media description

Format the response as valid JSON with these keys: meta_title, meta_description, meta_keywords, excerpt, social_title, social_description

Make sure the content is engaging, SEO-friendly, and includes the target keywords naturally.";
    }

    protected function parseSeoResponse(string $response): array
    {
        // Try to extract JSON from the response
        if (preg_match('/\{.*\}/s', $response, $matches)) {
            $json = $matches[0];
            $data = json_decode($json, true);

            if ($data) {
                return [
                    'meta_title' => $data['meta_title'] ?? '',
                    'meta_description' => $data['meta_description'] ?? '',
                    'meta_keywords' => $data['meta_keywords'] ?? '',
                    'excerpt' => $data['excerpt'] ?? '',
                    'social_title' => $data['social_title'] ?? '',
                    'social_description' => $data['social_description'] ?? '',
                ];
            }
        }

        // Fallback: return basic structure
        return [
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'excerpt' => '',
            'social_title' => '',
            'social_description' => '',
        ];
    }

    protected function showGeneratedContent(array $seoContent): void
    {
        $content = "**Generated SEO Content:**\n\n";
        $content .= '**Meta Title:** '.$seoContent['meta_title']."\n\n";
        $content .= '**Meta Description:** '.$seoContent['meta_description']."\n\n";
        $content .= '**Meta Keywords:** '.$seoContent['meta_keywords']."\n\n";
        $content .= '**Excerpt:** '.$seoContent['excerpt']."\n\n";
        $content .= '**Social Title:** '.$seoContent['social_title']."\n\n";
        $content .= '**Social Description:** '.$seoContent['social_description'];

        Notification::make()
            ->title('SEO Content Generated Successfully!')
            ->body($content)
            ->success()
            ->persistent()
            ->send();
    }
}
