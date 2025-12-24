<?php

namespace App\Filament\Resources\Admins\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdminsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->state(fn ($record) => $record->first_name . ' ' . $record->last_name)
                ->label('Admin Name')
                ->searchable(),
                TextColumn::make('email'),
                TextColumn::make('role')->label('Role'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                ->authorize('manageAdmins'),
                EditAction::make()
                ->authorize('manageAdmins'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->authorize('manageAdmins'),
                ]),
            ]);
    }
}
