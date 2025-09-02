<?php

namespace App\Filament\Resources\PortfolioGalleries\RelationManagers;

use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class PortfolioGalleryRelationManager extends RelationManager
{
    protected static string $relationship = 'gallery';

    protected static ?string $recordTitleAttribute = 'image';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/portfolio-gallery')
                    ->visibility('public')
                    ->required(),
                TextInput::make('alt_text')
                    ->maxLength(255),
                Textarea::make('caption')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('image')
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->url(fn ($record) => $record->image ? asset('storage/'.$record->image) : null)
                    ->size(60),
                Tables\Columns\TextColumn::make('alt_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('caption')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                //
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->slideOver(),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->slideOver(),
                Actions\DeleteAction::make()
                    ->slideOver(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('sort_order');
    }
}
