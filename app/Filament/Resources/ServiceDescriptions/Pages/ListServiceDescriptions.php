<?php

namespace App\Filament\Resources\ServiceDescriptions\Pages;

use App\Filament\Resources\ServiceDescriptions\ServiceDescriptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceDescriptions extends ListRecords
{
    protected static string $resource = ServiceDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->slideOver(),
        ];
    }
}
