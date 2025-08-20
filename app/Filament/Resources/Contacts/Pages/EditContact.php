<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('fetchLocation')
                ->label('Fetch Location')
                ->icon('heroicon-m-map-pin')
                ->color('info')
                ->visible(fn () => $this->record->ip_address && !$this->record->location_data)
                ->action(function () {
                    $locationData = $this->record->getLocationFromIp();
                    if ($locationData) {
                        $this->notify('success', 'Location data fetched successfully!');
                        $this->record->refresh();
                    } else {
                        $this->notify('error', 'Failed to fetch location data. Please try again.');
                    }
                })
                ->requiresConfirmation()
                ->modalHeading('Fetch Location Data')
                ->modalDescription('This will fetch location information from the IP address using ip-api.com service.')
                ->modalSubmitActionLabel('Fetch Location'),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
