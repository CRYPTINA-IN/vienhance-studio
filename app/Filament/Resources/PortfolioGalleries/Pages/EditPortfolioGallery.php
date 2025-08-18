<?php

namespace App\Filament\Resources\PortfolioGalleries\Pages;

use App\Filament\Resources\PortfolioGalleries\PortfolioGalleryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioGallery extends EditRecord
{
    protected static string $resource = PortfolioGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
