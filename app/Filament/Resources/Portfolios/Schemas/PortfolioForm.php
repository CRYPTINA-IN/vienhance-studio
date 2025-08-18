<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('client')
                    ->required(),
                TextInput::make('industry')
                    ->required(),
                Textarea::make('overview')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('about_project')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('uploads/portfolios')
                    ->disk('public')
                    ->visibility('public')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('short_description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('testimonial')
                    ->columnSpanFull(),
                TextInput::make('meta_title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
                Textarea::make('meta_keywords')
                    ->columnSpanFull(),
                TextInput::make('og_title'),
                Textarea::make('og_description')
                    ->columnSpanFull(),
                FileUpload::make('og_image')
                    ->image()
                    ->directory('uploads/portfolios')
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
                    ->directory('uploads/portfolios')
                    ->disk('public')
                    ->visibility('public'),
                TextInput::make('twitter_site'),
                TextInput::make('twitter_creator'),
                TextInput::make('canonical_url'),
                TextInput::make('schema_markup'),
                TextInput::make('priority')
                    ->numeric(),
                TextInput::make('change_frequency'),
                Select::make('status')
                    ->options(['live' => 'Live', 'in-development' => 'In development', 'recurring' => 'Recurring'])
                    ->default('in-development')
                    ->required(),
            ]);
    }
}
