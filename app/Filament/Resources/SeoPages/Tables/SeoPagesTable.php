<?php

namespace App\Filament\Resources\SeoPages\Tables;

use App\Filament\Actions\GenerateSeoPageContent;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SeoPagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('subtitle')
                    ->searchable()
                    ->limit(40)
                    ->toggleable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(),

                ImageColumn::make('featured_image')
                    ->circular()
                    ->toggleable(),

                TextColumn::make('description')
                    ->limit(60)
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('is_ai_generated')
                    ->boolean()
                    ->label('AI Generated')
                    ->toggleable(),

                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

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
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                GenerateSeoPageContent::make(),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
