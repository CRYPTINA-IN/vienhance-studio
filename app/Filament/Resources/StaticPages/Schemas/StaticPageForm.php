<?php

namespace App\Filament\Resources\StaticPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StaticPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_name')
                    ->required(),
                TextInput::make('route_name')
                    ->required(),
                TextInput::make('title'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
