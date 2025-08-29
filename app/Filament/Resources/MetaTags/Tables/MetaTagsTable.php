<?php

namespace App\Filament\Resources\MetaTags\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MetaTagsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('taggable_type')
                    ->searchable(),
                TextColumn::make('taggable_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('canonical_url')
                    ->searchable(),
                TextColumn::make('og_title')
                    ->searchable(),
                ImageColumn::make('og_image'),
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
                ImageColumn::make('twitter_image'),
                TextColumn::make('twitter_site')
                    ->searchable(),
                TextColumn::make('twitter_creator')
                    ->searchable(),
                TextColumn::make('priority')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('change_frequency')
                    ->searchable(),
                TextColumn::make('robots')
                    ->searchable(),
                TextColumn::make('author')
                    ->searchable(),
                TextColumn::make('language')
                    ->searchable(),
                TextColumn::make('geo_region')
                    ->searchable(),
                TextColumn::make('geo_placename')
                    ->searchable(),
                TextColumn::make('geo_position')
                    ->searchable(),
                TextColumn::make('icbm')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
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
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
