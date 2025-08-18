<?php

namespace App\Filament\Resources\ServiceDescriptions\Pages;

use App\Filament\Resources\ServiceDescriptions\ServiceDescriptionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceDescription extends EditRecord
{
    protected static string $resource = ServiceDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
