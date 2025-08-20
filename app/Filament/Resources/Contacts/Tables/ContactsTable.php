<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\BulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\Action;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable(['fname', 'lname'])
                    ->sortable(['fname', 'lname'])
                    ->weight('bold'),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('message')
                    ->label('Message')
                    ->limit(50)
                    ->searchable()
                    ->wrap(),
                TextColumn::make('formatted_location')
                    ->label('Location')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->description(fn ($record) => $record->ip_address)
                    ->icon('heroicon-m-map-pin'),
                IconColumn::make('is_read')
                    ->label('Read')
                    ->boolean()
                    ->trueIcon('heroicon-m-check-circle')
                    ->falseIcon('heroicon-m-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('M j, Y g:i A')
                    ->sortable(),
            ])
            ->filters([
                Filter::make('unread')
                    ->label('Unread Messages')
                    ->query(fn (Builder $query): Builder => $query->where('is_read', false)),
                Filter::make('read')
                    ->label('Read Messages')
                    ->query(fn (Builder $query): Builder => $query->where('is_read', true)),
                Filter::make('recent')
                    ->label('Last 7 Days')
                    ->query(fn (Builder $query): Builder => $query->where('created_at', '>=', now()->subDays(7))),
                TrashedFilter::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make()
                    ->label('View Details'),
                Action::make('markAsRead')
                    ->label('Mark as Read')
                    ->color('success')
                    ->visible(fn ($record) => !$record->is_read)
                    ->action(fn ($record) => $record->markAsRead())
                    ->requiresConfirmation(),
                Action::make('fetchLocation')
                    ->label('Fetch Location')
                    ->color('info')
                    ->visible(fn ($record) => $record->ip_address && !$record->location_data)
                    ->action(fn ($record) => $record->getLocationFromIp())
                    ->requiresConfirmation()
                    ->modalHeading('Fetch Location Data')
                    ->modalDescription('This will fetch location information from the IP address using ip-api.com service.')
                    ->modalSubmitActionLabel('Fetch Location'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('fetchLocation')
                        ->label('Fetch Location Data')
                        ->icon('heroicon-m-map-pin')
                        ->color('info')
                        ->action(function ($records) {
                            $successCount = 0;
                            $failCount = 0;
                            
                            foreach ($records as $record) {
                                if ($record->ip_address && !$record->location_data) {
                                    $locationData = $record->getLocationFromIp();
                                    if ($locationData) {
                                        $successCount++;
                                    } else {
                                        $failCount++;
                                    }
                                }
                            }
                            
                            // Return success message
                            if ($successCount > 0 && $failCount == 0) {
                                return "Location data fetched for {$successCount} contact(s) successfully!";
                            } elseif ($successCount > 0 && $failCount > 0) {
                                return "Location data fetched for {$successCount} contact(s). Failed for {$failCount} contact(s).";
                            } elseif ($failCount > 0) {
                                return "Failed to fetch location data for {$failCount} contact(s).";
                            } else {
                                return "No contacts selected for location fetching.";
                            }
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Fetch Location Data for Multiple Contacts')
                        ->modalDescription('This will fetch location information from IP addresses for selected contacts using ip-api.com service.')
                        ->modalSubmitActionLabel('Fetch Location Data'),
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
