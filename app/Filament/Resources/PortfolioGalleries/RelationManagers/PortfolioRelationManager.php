<?php

namespace App\Filament\Resources\PortfolioGalleries\RelationManagers;

use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class PortfolioRelationManager extends RelationManager
{
    protected static string $relationship = 'portfolio';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('client')
                    ->required()
                    ->maxLength(255),
                TextInput::make('industry')
                    ->required()
                    ->maxLength(255),
                Textarea::make('overview')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Textarea::make('about_project')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('uploads/portfolios')
                    ->disk('public')
                    ->visibility('public')
                    ->required(),
                FileUpload::make('og_image')
                    ->image()
                    ->directory('uploads/portfolios')
                    ->disk('public')
                    ->visibility('public'),
                FileUpload::make('twitter_image')
                    ->image()
                    ->directory('uploads/portfolios')
                    ->disk('public')
                    ->visibility('public'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Textarea::make('short_description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Textarea::make('testimonial')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(['live' => 'Live', 'in-development' => 'In development', 'recurring' => 'Recurring'])
                    ->default('in-development')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client')
                    ->searchable(),
                Tables\Columns\TextColumn::make('industry')
                    ->searchable(),
                Tables\Columns\TextColumn::make('short_description')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'live' => 'success',
                        'in-development' => 'warning',
                        'recurring' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Actions\EditAction::make()
                    ->slideOver(),
            ])
            ->bulkActions([
                //
            ]);
    }
}
