<?php

namespace App\Filament\Resources\StaticPages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StaticPagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_name')
                    ->searchable(),
                TextColumn::make('route_name')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('og_title')
                    ->searchable(),
                ImageColumn::make('og_image')
                    ->disk('public')
                    ->url(fn ($record) => $record->og_image ? asset('storage/' . $record->og_image) : null),
                TextColumn::make('og_type')
                    ->searchable(),
                TextColumn::make('og_url')
                    ->searchable(),
                TextColumn::make('og_site_name')
                    ->searchable(),
                TextColumn::make('twitter_card')
                    ->searchable(),
                TextColumn::make('twitter_title')
                    ->searchable(),
                ImageColumn::make('twitter_image')
                    ->disk('public')
                    ->url(fn ($record) => $record->twitter_image ? asset('storage/' . $record->twitter_image) : null),
                TextColumn::make('twitter_site')
                    ->searchable(),
                TextColumn::make('twitter_creator')
                    ->searchable(),
                TextColumn::make('canonical_url')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                TextColumn::make('priority')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('change_frequency')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->slideOver(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
