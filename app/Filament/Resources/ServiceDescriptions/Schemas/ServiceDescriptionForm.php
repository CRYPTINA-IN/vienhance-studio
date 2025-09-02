<?php

namespace App\Filament\Resources\ServiceDescriptions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceDescriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_id')
                    ->relationship('service', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('section_1')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('section_2')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('section_3')
                    ->required()
                    ->columnSpanFull(),
                TagsInput::make('benefits')
                    ->label('Benefits')
                    ->required()
                    ->columnSpanFull()
                    ->separator(',')
                    ->suggestions([
                        'Enhanced User Satisfaction',
                        'Higher Conversion Rates',
                        'Improved Brand Loyalty',
                        'Reduced Development Costs',
                        'Increased User Retention',
                        'Accessible & Inclusive Designs',
                        'Better User Experience',
                        'Increased Engagement',
                        'Faster Loading Times',
                        'Mobile Responsive',
                    ]),
                Repeater::make('process')
                    ->schema([
                        FileUpload::make('icon')
                            ->image()
                            ->directory('uploads/service-descriptions')
                            ->disk('public')
                            ->visibility('public')
                            ->required(),
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->maxLength(65535),
                    ])
                    ->columnSpanFull()
                    ->defaultItems(0)
                    ->reorderable(false)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                Repeater::make('faqs')
                    ->schema([
                        TextInput::make('question')
                            ->label('Question')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('answer')
                            ->label('Answer')
                            ->required()
                            ->maxLength(65535),
                    ])
                    ->columnSpanFull()
                    ->defaultItems(0)
                    ->reorderable(false)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['question'] ?? null),
            ]);
    }
}
