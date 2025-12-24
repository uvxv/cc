<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')->schema([
                    TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nic')
                    ->required()
                    ->maxLength(12),
                    TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                ]),
                Section::make('Credentials')->schema([
                    TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->maxLength(255)
                    ->label('Default Password')
                    ->hiddenOn('edit')
                    ->revealable(),
                ]),
                Section::make('Documents')->schema([
                FileUpload::make('image')
                    ->label('Profile Photo')
                    ->image()
                    ->maxSize(1024)
                    ->disk('public')
                    ->directory('Nic')
                    ->nullable()
                    ->visibility('public')
                    ->label('Upload NIC Image'),
                ])->columnSpan('full'),
                
            ])->columns(2);
    }
}
