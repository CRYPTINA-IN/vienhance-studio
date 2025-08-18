<?php

namespace App\Filament\Resources\PortfolioGalleries\Pages;

use App\Filament\Resources\PortfolioGalleries\PortfolioGalleryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioGalleries extends ListRecords
{
    protected static string $resource = PortfolioGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->slideOver(),
        ];
    }
}
