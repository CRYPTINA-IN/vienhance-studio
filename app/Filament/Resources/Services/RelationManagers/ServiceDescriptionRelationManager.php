<?php

namespace App\Filament\Resources\Services\RelationManagers;

use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceDescriptionRelationManager extends RelationManager
{
    protected static string $relationship = 'description';

    protected static ?string $recordTitleAttribute = 'service_id';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('section_1')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Textarea::make('section_2')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Textarea::make('section_3')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TagsInput::make('benefits')
                    ->label('Benefits')
                    ->required()
                    ->columnSpanFull()
                    ->separator(',')
                    ->suggestions([
                        'Enhanced User Satisfaction',
                        'Higher Conversion Rates',
                        'Improved Brand Loyalty',
                        'Reduced Development Costs',
                        'Increased User Retention',
                        'Accessible & Inclusive Designs',
                        'Better User Experience',
                        'Increased Engagement',
                        'Faster Loading Times',
                        'Mobile Responsive',
                    ]),
                Repeater::make('process')
                    ->schema([
                        FileUpload::make('icon')
                            ->image()
                            ->directory('uploads/service-descriptions')
                            ->disk('public')
                            ->visibility('public')
                            ->required(),
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->maxLength(65535),
                    ])
                    ->columnSpanFull()
                    ->defaultItems(0)
                    ->reorderable(false)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                Repeater::make('faqs')
                    ->schema([
                        TextInput::make('question')
                            ->label('Question')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('answer')
                            ->label('Answer')
                            ->required()
                            ->maxLength(65535),
                    ])
                    ->columnSpanFull()
                    ->defaultItems(0)
                    ->reorderable(false)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['question'] ?? null),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('service_id')
            ->columns([
                Tables\Columns\TextColumn::make('section_1')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
            ]);
    }
}
