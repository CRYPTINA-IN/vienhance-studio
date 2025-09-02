<?php

namespace App\Filament\Forms\Components;

use App\Filament\Actions\GenerateSeoContent;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class AiSeoGenerator extends Section
{
    protected string $view = 'filament.forms.components.ai-seo-generator';

    public static function make(): static
    {
        return app(static::class);
    }

    public function generateSeoAction(): Action
    {
        return GenerateSeoContent::make()
            ->after(function (array $data) {
                // Update the form fields with generated content
                $this->getLivewire()->form->fill([
                    'meta_title' => $data['meta_title'] ?? '',
                    'meta_description' => $data['meta_description'] ?? '',
                    'meta_keywords' => $data['meta_keywords'] ?? '',
                    'excerpt' => $data['excerpt'] ?? '',
                ]);
            });
    }

    public function getSchema(): array
    {
        return [
            TextInput::make('title')
                ->label('Content Title')
                ->required()
                ->placeholder('Enter the title of your content')
                ->live(onBlur: true),

            Textarea::make('content')
                ->label('Content')
                ->required()
                ->placeholder('Enter your content to generate SEO from')
                ->rows(5)
                ->live(onBlur: true),

            TextInput::make('target_keywords')
                ->label('Target Keywords')
                ->placeholder('Enter target keywords (comma separated)')
                ->helperText('Optional: Specific keywords you want to target'),

            $this->generateSeoAction(),

            TextInput::make('meta_title')
                ->label('Generated Meta Title')
                ->placeholder('AI will generate this')
                ->readonly(),

            Textarea::make('meta_description')
                ->label('Generated Meta Description')
                ->placeholder('AI will generate this')
                ->rows(3)
                ->readonly(),

            TextInput::make('meta_keywords')
                ->label('Generated Meta Keywords')
                ->placeholder('AI will generate this')
                ->readonly(),

            Textarea::make('excerpt')
                ->label('Generated Excerpt')
                ->placeholder('AI will generate this')
                ->rows(3)
                ->readonly(),
        ];
    }
}
