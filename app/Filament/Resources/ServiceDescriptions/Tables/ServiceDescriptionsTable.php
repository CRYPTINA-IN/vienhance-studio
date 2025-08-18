<?php

namespace App\Filament\Resources\ServiceDescriptions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ServiceDescriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service.title')
                    ->label('Service')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('section_1')
                    ->label('Section 1')
                    ->limit(50)
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('benefits_count')
                    ->label('Benefits')
                    ->getStateUsing(function ($record) {
                        return is_array($record->benefits) ? count($record->benefits) : 0;
                    })
                    ->badge()
                    ->color('success'),
                TextColumn::make('process_count')
                    ->label('Process Steps')
                    ->getStateUsing(function ($record) {
                        return is_array($record->process) ? count($record->process) : 0;
                    })
                    ->badge()
                    ->color('info'),
                TextColumn::make('faqs_count')
                    ->label('FAQs')
                    ->getStateUsing(function ($record) {
                        return is_array($record->faqs) ? count($record->faqs) : 0;
                    })
                    ->badge()
                    ->color('warning'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
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
