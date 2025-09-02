<?php

namespace App\Filament\Resources\ServiceDescriptions;

use App\Filament\Resources\ServiceDescriptions\Pages\CreateServiceDescription;
use App\Filament\Resources\ServiceDescriptions\Pages\EditServiceDescription;
use App\Filament\Resources\ServiceDescriptions\Pages\ListServiceDescriptions;
use App\Filament\Resources\ServiceDescriptions\RelationManagers\ServiceRelationManager;
use App\Filament\Resources\ServiceDescriptions\Schemas\ServiceDescriptionForm;
use App\Filament\Resources\ServiceDescriptions\Tables\ServiceDescriptionsTable;
use App\Models\ServiceDescription;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ServiceDescriptionResource extends Resource
{
    protected static ?string $model = ServiceDescription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static UnitEnum|string|null $navigationGroup = 'Services Management';

    protected static ?string $navigationLabel = 'Service Details';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ServiceDescriptionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceDescriptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ServiceRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceDescriptions::route('/'),
            'create' => CreateServiceDescription::route('/create'),
            'edit' => EditServiceDescription::route('/{record}/edit'),
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
