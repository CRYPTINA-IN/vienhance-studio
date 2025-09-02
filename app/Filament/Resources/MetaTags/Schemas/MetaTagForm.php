<?php

namespace App\Filament\Resources\MetaTags\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MetaTagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('taggable_type')
                    ->required(),
                TextInput::make('taggable_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
                Textarea::make('meta_keywords')
                    ->columnSpanFull(),
                TextInput::make('canonical_url'),
                TextInput::make('og_title'),
                Textarea::make('og_description')
                    ->columnSpanFull(),
                FileUpload::make('og_image')
                    ->image(),
                TextInput::make('og_type')
                    ->required()
                    ->default('website'),
                TextInput::make('og_url'),
                TextInput::make('og_site_name'),
                TextInput::make('twitter_card')
                    ->required()
                    ->default('summary_large_image'),
                TextInput::make('twitter_title'),
                Textarea::make('twitter_description')
                    ->columnSpanFull(),
                FileUpload::make('twitter_image')
                    ->image(),
                TextInput::make('twitter_site'),
                TextInput::make('twitter_creator'),
                TextInput::make('schema_markup'),
                TextInput::make('priority')
                    ->required()
                    ->numeric()
                    ->default(0.5),
                TextInput::make('change_frequency')
                    ->required()
                    ->default('monthly'),
                TextInput::make('robots')
                    ->required()
                    ->default('index, follow'),
                TextInput::make('author'),
                TextInput::make('language'),
                TextInput::make('geo_region'),
                TextInput::make('geo_placename'),
                TextInput::make('geo_position'),
                TextInput::make('icbm'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
