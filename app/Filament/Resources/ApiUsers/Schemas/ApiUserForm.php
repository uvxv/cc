<?php

namespace App\Filament\Resources\ApiUsers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApiUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('access_id')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
            ]);
    }
}
