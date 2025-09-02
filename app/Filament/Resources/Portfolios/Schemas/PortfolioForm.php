<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
                Select::make('status')
                    ->options(['live' => 'Live', 'in-development' => 'In development', 'recurring' => 'Recurring'])
                    ->default('in-development')
                    ->required(),
            ]);
    }
}
