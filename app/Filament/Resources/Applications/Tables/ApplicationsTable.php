<?php

namespace App\Filament\Resources\Applications\Tables;

use Filament\Tables\Table;
use App\Models\Application;
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
            ->poll('15s')
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
                    ->label('Medical Office Area')
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
                    ->visible(fn ($record) => $record->status !== 'approved' && $record->status !== 'rejected')
                    ->color('success')
                    ->requiresConfirmation()
                    ->button()
                    ->icon('heroicon-o-check-circle')
                    ->action(function ($record) {
                        $record->update(['status' => 'approved']);
                        $record->user->notify(new ApplicationApproved());
                    })->authorize('approve'),
                Action::make('Reject')
                    ->visible(fn ($record) => $record->status !== 'rejected' && $record->status !== 'approved')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->button()
                    ->icon('heroicon-o-x-circle')
                    ->action(function ($record) {
                        $record->update(['status' => 'rejected']);
                    })->authorize('reject'),
                ActionGroup::make([
                EditAction::make()->authorize('update'),
                ViewAction::make()->authorize('view'),
                DeleteAction::make()->authorize('delete'),
                ]),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->color('danger')
                    ->authorize('delete', Application::class),
                ]),
            ]);
    }
}
