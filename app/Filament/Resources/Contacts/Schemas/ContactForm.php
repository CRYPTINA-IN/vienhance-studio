<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('fname')
                    ->label('First Name')
                    ->required()
                    ->disabled(),
                TextInput::make('lname')
                    ->label('Last Name')
                    ->required()
                    ->disabled(),
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->disabled()
                    ->copyable(),
                TextInput::make('phone')
                    ->label('Phone Number')
                    ->tel()
                    ->required()
                    ->disabled()
                    ->copyable()
                    ->regex('/^[6-9]\d{9}$/')
                    ->helperText('Must be exactly 10 digits starting with 6, 7, 8, or 9'),
                Textarea::make('message')
                    ->label('Message')
                    ->required()
                    ->rows(6)
                    ->disabled()
                    ->columnSpanFull(),
                TextInput::make('ip_address')
                    ->label('IP Address')
                    ->disabled()
                    ->copyable(),
                TextInput::make('formatted_location')
                    ->label('Location')
                    ->disabled()
                    ->helperText('Automatically fetched from IP address'),
                Toggle::make('is_read')
                    ->label('Mark as Read')
                    ->helperText('Toggle to mark this message as read or unread'),
            ]);
    }
}
