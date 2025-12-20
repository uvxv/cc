<?php

namespace App\Filament\Resources\Applications\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use App\Notifications\ApplicationApproved;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Name')
                ->state(fn ($record) => $record->user->first_name.' '.$record->user->last_name)
                ->label('Applicant Name')
                ->searchable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),
                TextColumn::make('province')
                    ->label('Province')
                    ->searchable(),
                TextColumn::make('area')
                    ->label('Area')
                    ->searchable(),
                TextColumn::make('blood_type')  
                    ->label('Blood Type')
                    ->searchable(),
                TextColumn::make('vehicle_group')
                    ->label('Vehicle Group')
                    ->formatStateUsing(fn($state) => str_replace('_', ' ', (string) $state))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Applied At')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('Approve')
                    ->color('success')
                    ->requiresConfirmation()
                    ->button()
                    ->icon('heroicon-o-check-circle')
                    ->action(function ($record) {
                        // $record->update(['status' => 'approved']);
                        $record->user->notify(new ApplicationApproved());
                    }),
                ActionGroup::make([
                EditAction::make(),
                ViewAction::make(),
                DeleteAction::make(),
                ]),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->color('danger'),
                    
                ]),
            ]);
    }
}
