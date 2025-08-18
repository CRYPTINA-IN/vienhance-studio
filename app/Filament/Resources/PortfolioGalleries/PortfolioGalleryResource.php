<?php

namespace App\Filament\Resources\PortfolioGalleries;

use App\Filament\Resources\PortfolioGalleries\Pages\CreatePortfolioGallery;
use App\Filament\Resources\PortfolioGalleries\Pages\EditPortfolioGallery;
use App\Filament\Resources\PortfolioGalleries\Pages\ListPortfolioGalleries;
use App\Filament\Resources\PortfolioGalleries\Schemas\PortfolioGalleryForm;
use App\Filament\Resources\PortfolioGalleries\Tables\PortfolioGalleriesTable;
use App\Models\PortfolioGallery;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PortfolioGalleries\RelationManagers\PortfolioRelationManager;
use UnitEnum;

class PortfolioGalleryResource extends Resource
{
    protected static ?string $model = PortfolioGallery::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static UnitEnum|string|null $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Portfolio Images';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return PortfolioGalleryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PortfolioGalleriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            PortfolioRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPortfolioGalleries::route('/'),
            'create' => CreatePortfolioGallery::route('/create'),
            'edit' => EditPortfolioGallery::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
