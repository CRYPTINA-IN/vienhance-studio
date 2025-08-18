<?php

namespace App\Filament\Resources\Portfolios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('client')
                    ->searchable(),
                TextColumn::make('industry')
                    ->searchable(),
                ImageColumn::make('image')
                    ->disk('public')
                    ->url(fn ($record) => $record->image ? asset('storage/' . $record->image) : null),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('meta_title')
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
                TextColumn::make('priority')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('change_frequency')
                    ->searchable(),
                TextColumn::make('status'),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make()
                    ->slideOver(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
