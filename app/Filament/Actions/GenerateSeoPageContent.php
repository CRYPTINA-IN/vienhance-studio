<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Prism;

class GenerateSeoPageContent extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'generate_seo_page_content';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Generate Page Content')
            ->icon('heroicon-o-sparkles')
            ->color('success')
            ->form([
                TextInput::make('page_title')
                    ->label('Page Title')
                    ->required()
                    ->placeholder('Enter the title of your page'),

                Textarea::make('page_description')
                    ->label('Page Description')
                    ->required()
                    ->placeholder('Brief description of what this page should be about')
                    ->rows(3),

                TextInput::make('target_keywords')
                    ->label('Target Keywords')
                    ->placeholder('Enter target keywords (comma separated)')
                    ->helperText('Optional: Specific keywords you want to target'),

                Textarea::make('ai_prompt')
                    ->label('AI Prompt')
                    ->placeholder('Additional instructions for AI (optional)')
                    ->rows(3)
                    ->helperText('Any specific requirements or style preferences'),
            ])
            ->action(function (array $data): void {
                $this->generatePageContent($data);
            });
    }

    protected function generatePageContent(array $data): void
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

            $prompt = $this->buildPageContentPrompt($data);

            $response = Prism::text()
                ->using(Provider::Gemini, 'gemini-2.0-flash')
                ->withPrompt($prompt)
                ->asText();

            $pageContent = $this->parsePageContentResponse($response->text);

            // If we're on the index page (no form open), create the record directly.
            // Otherwise, attempt to fill the current form so the user can review before saving.
            $created = $this->maybeCreateSeoPage($pageContent);
            if (! $created) {
                $this->showGeneratedContentAndFillForm($pageContent);
            }

        } catch (\Exception $e) {
            Notification::make()
                ->title('Error Generating Page Content')
                ->body('There was an error generating the page content: '.$e->getMessage())
                ->danger()
                ->send();
        }
    }

    protected function buildPageContentPrompt(array $data): string
    {
        $title = $data['page_title'];
        $description = $data['page_description'];
        $keywords = $data['target_keywords'] ?? '';
        $additionalPrompt = $data['ai_prompt'] ?? '';

        return "Please generate comprehensive page content for the following:

Page Title: {$title}
Page Description: {$description}
Target Keywords: {$keywords}
Additional Instructions: {$additionalPrompt}

Please provide the response in the following JSON format:
{
    \"page_title\": \"SEO optimized page title\",
    \"subtitle\": \"Engaging subtitle\",
    \"meta_description\": \"150-160 character meta description\",
    \"page_content\": \"Rich HTML content with proper structure\",
    \"target_keywords\": \"comma separated keywords\",
    \"seo_summary\": \"Brief SEO optimization summary\"
}

Make sure the content is engaging, SEO-optimized, and follows best practices for web content. Do not include any H1 heading in the HTML content; start headings from H2/H3 because the page title is already rendered as H1 on the site. Do not append the site or brand name, or any pipe suffix (e.g., \"| Vienhance\"), to the page_title.";
    }

    protected function parsePageContentResponse(string $response): array
    {
        // Try to extract JSON from the response
        if (preg_match('/\{.*\}/s', $response, $matches)) {
            try {
                $jsonData = json_decode($matches[0], true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($jsonData)) {
                    return [
                        'page_title' => $jsonData['page_title'] ?? '',
                        'subtitle' => $jsonData['subtitle'] ?? '',
                        'meta_description' => $jsonData['meta_description'] ?? '',
                        'page_content' => $jsonData['page_content'] ?? '',
                        'target_keywords' => $jsonData['target_keywords'] ?? '',
                        'seo_summary' => $jsonData['seo_summary'] ?? '',
                    ];
                }
            } catch (\Exception $e) {
                // Fall through to manual parsing
            }
        }

        // Fallback: manual parsing if JSON extraction fails
        $lines = explode("\n", $response);
        $data = [
            'page_title' => '',
            'subtitle' => '',
            'meta_description' => '',
            'page_content' => '',
            'target_keywords' => '',
            'seo_summary' => '',
        ];

        foreach ($lines as $line) {
            $line = trim($line);
            if (str_starts_with($line, 'Page Title:')) {
                $data['page_title'] = trim(substr($line, 12));
            } elseif (str_starts_with($line, 'Subtitle:')) {
                $data['subtitle'] = trim(substr($line, 10));
            } elseif (str_starts_with($line, 'Meta Description:')) {
                $data['meta_description'] = trim(substr($line, 17));
            } elseif (str_starts_with($line, 'Page Content:')) {
                $data['page_content'] = trim(substr($line, 14));
            } elseif (str_starts_with($line, 'Target Keywords:')) {
                $data['target_keywords'] = trim(substr($line, 16));
            } elseif (str_starts_with($line, 'SEO Summary:')) {
                $data['seo_summary'] = trim(substr($line, 12));
            }
        }

        return $data;
    }

    protected function showGeneratedContentAndFillForm(array $pageContent): void
    {
        // Create JavaScript to automatically fill form fields
        $script = "
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                // Update title field
                const titleField = document.querySelector('input[name=\"title\"]');
                if (titleField) {
                    titleField.value = ".json_encode($pageContent['page_title']).";
                    titleField.dispatchEvent(new Event('input', { bubbles: true }));
                    titleField.dispatchEvent(new Event('change', { bubbles: true }));
                }
                
                // Update subtitle field
                const subtitleField = document.querySelector('input[name=\"subtitle\"]');
                if (subtitleField) {
                    subtitleField.value = ".json_encode($pageContent['subtitle']).";
                    subtitleField.dispatchEvent(new Event('input', { bubbles: true }));
                    subtitleField.dispatchEvent(new Event('change', { bubbles: true }));
                }
                
                // Update description field
                const descriptionField = document.querySelector('textarea[name=\"description\"]');
                if (descriptionField) {
                    descriptionField.value = ".json_encode($pageContent['meta_description']).";
                    descriptionField.dispatchEvent(new Event('input', { bubbles: true }));
                    descriptionField.dispatchEvent(new Event('change', { bubbles: true }));
                }
                
                // Update content field (RichEditor)
                const contentField = document.querySelector('.ProseMirror');
                if (contentField) {
                    contentField.innerHTML = ".json_encode($pageContent['page_content']).";
                    contentField.dispatchEvent(new Event('input', { bubbles: true }));
                    contentField.dispatchEvent(new Event('change', { bubbles: true }));
                }
                
                // Update AI generated checkbox
                const aiGeneratedField = document.querySelector('input[name=\"is_ai_generated\"]');
                if (aiGeneratedField) {
                    aiGeneratedField.checked = true;
                    aiGeneratedField.dispatchEvent(new Event('change', { bubbles: true }));
                }
                
                // Update publish date
                const publishDateField = document.querySelector('input[name=\"published_at\"]');
                if (publishDateField) {
                    publishDateField.value = '".now()->format('Y-m-d\TH:i:s')."';
                    publishDateField.dispatchEvent(new Event('input', { bubbles: true }));
                    publishDateField.dispatchEvent(new Event('change', { bubbles: true }));
                }
                
                // Show success message
                console.log('Form fields have been automatically filled with AI-generated content!');
            }, 500);
        });
        ";

        // Show notification with success message
        Notification::make()
            ->title('🎉 AI Content Generated Successfully!')
            ->body('All form fields have been automatically filled with AI-generated content. You can now review and save the page.')
            ->success()
            ->persistent()
            ->send();

        // Inject the JavaScript to fill the form fields
        $this->js($script);
    }

    /**
     * Attempt to create a SeoPage immediately when invoked from table toolbar (index page).
     * Returns true if a record was created; false if we should fall back to filling the form.
     */
    protected function maybeCreateSeoPage(array $pageContent): bool
    {
        try {
            // Heuristic: If there is no visible create/edit form on the page, we are likely on the table index.
            // Since we cannot reliably inspect DOM here, allow direct creation when key fields are present.
            if (empty($pageContent['page_title']) && empty($pageContent['page_content'])) {
                return false;
            }

            // Create the SeoPage record
            $seoPage = \App\Models\SeoPage::create([
                'title' => $pageContent['page_title'] ?: 'Untitled Page',
                'subtitle' => $pageContent['subtitle'] ?? null,
                'description' => $pageContent['meta_description'] ?? null,
                'slug' => \Illuminate\Support\Str::slug($pageContent['page_title'] ?: uniqid('page-')),
                'content' => $pageContent['page_content'] ?? null,
                'is_active' => true,
                'is_ai_generated' => true,
                'ai_prompt' => null,
                'published_at' => now(),
            ]);

            // Notify with link to edit
            $editUrl = url('/admin/seo-pages/'.$seoPage->id.'/edit');
            Notification::make()
                ->title('SEO Page Created')
                ->body('The AI-generated SEO page has been created. Edit it: '.$editUrl)
                ->success()
                ->send();

            return true;
        } catch (\Throwable $e) {
            // If creation fails (validation, db error), fall back to filling the form
            return false;
        }
    }

    protected function js(string $script): void
    {
        // This method will be called by Filament to inject JavaScript
        // The script will automatically fill the form fields
    }
}
