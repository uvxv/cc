<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use PHPUnit\Metadata\Test;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Name')
                ->state(fn (User $user) => $user->first_name . ' ' . $user->last_name)
                ->label('First Name')
                ->searchable(isIndividual: true),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(isIndividual: true),
                TextColumn::make('nic')
                    ->label('NIC')
                    ->searchable(isIndividual: true),
                TextColumn::make('address')
                    ->label('Address')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Jointed At')
                    ->dateTime('d-M-Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
