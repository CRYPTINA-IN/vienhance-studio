<?php

namespace App\Filament\Resources\StaticPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StaticPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_name')
                    ->required(),
                TextInput::make('route_name')
                    ->required(),
                TextInput::make('title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
                Textarea::make('meta_keywords')
                    ->columnSpanFull(),
                TextInput::make('og_title'),
                Textarea::make('og_description')
                    ->columnSpanFull(),
                FileUpload::make('og_image')
                    ->image()
                    ->directory('uploads/static-pages')
                    ->disk('public')
                    ->visibility('public'),
                TextInput::make('og_type'),
                TextInput::make('og_url'),
                TextInput::make('og_site_name'),
                TextInput::make('twitter_card'),
                TextInput::make('twitter_title'),
                Textarea::make('twitter_description')
                    ->columnSpanFull(),
                FileUpload::make('twitter_image')
                    ->image()
                    ->directory('uploads/static-pages')
                    ->disk('public')
                    ->visibility('public'),
                TextInput::make('twitter_site'),
                TextInput::make('twitter_creator'),
                TextInput::make('canonical_url'),
                Textarea::make('schema_markup')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('priority')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('change_frequency')
                    ->required()
                    ->default('weekly'),
            ]);
    }
}
