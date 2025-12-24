<?php

namespace App\Filament\Resources\Admins\Schemas;

use Dom\Text;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
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
                    ->revealable()
                    ->dehydrateStateUsing(fn ($state) => $state ? Hash::make($state) : null)
                    ->dehydrated(fn ($state) => filled($state)),
                Select::make('role')
                    ->options([
                        'superadmin' => 'Super Admin',
                        'moderator' => 'Moderator',
                        'viewer' => 'Viewer',
                    ])
                    ->required()
                    ->label('Role'),
            ]);
    }
}
