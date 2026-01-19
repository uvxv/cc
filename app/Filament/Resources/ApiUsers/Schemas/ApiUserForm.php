<?php

namespace App\Filament\Resources\ApiUsers\Schemas;

use Closure;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

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
                    ->required()
                    ->suffixAction(Action::make('generate')
                    ->label('Generate')
                    ->icon('heroicon-s-arrow-path')
                    ->action(function ($set) {
                        $set('access_id', (string) random_int(1000000000, 9999999999));
                    })
                ),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->dehydrateStateUsing(fn($state) => $state ? bcrypt($state) : null),
            ]);
    }
}
