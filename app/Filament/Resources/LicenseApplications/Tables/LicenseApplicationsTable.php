<?php

namespace App\Filament\Resources\LicenseApplications\Tables;

use Dom\Text;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use App\Models\LicenseApplication;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use App\Notifications\LicenseAddedNotification;
use App\Models\License;


class LicenseApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->state(fn($record) => $record->user->first_name . ' ' . $record->user->last_name)
                    ->label('Applicant Name'),
                TextColumn::make('user.email')
                    ->label('Applicant Email'),
                TextColumn::make('id')
                    ->label('Application ID'),
                IconColumn::make('status')
                    ->label('Status')
                    ->icon(fn ($record) => match ($record->status) {
                        'pending' => 'heroicon-o-clock',
                        'approved' => 'heroicon-o-check-circle',
                        'rejected' => 'heroicon-o-x-circle',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),
                TextColumn::make('created_at')
                    ->label('Submitted On'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('Approve')
                    ->visible(fn($record) => $record->status !== 'approved' && $record->status !== 'rejected')
                    ->color('success')
                    ->requiresConfirmation()
                    ->button()
                    ->icon('heroicon-o-check-circle')
                    ->action(function (LicenseApplication $record) {
                        License::create([
                            'number' => $record->license_number,
                            'issue_date' => $record->issue_date,
                            'expiry_date' => $record->expiry_date,
                            'category' => $record->category,
                            'image' => $record->image,
                            'type' => 'Standard',
                            'user_id' => $record->user_id,
                        ]);
                        $record->update(['status' => 'approved']);
                        $record->user->notify(new LicenseAddedNotification());
                    }),
                Action::make('Reject')
                    ->visible(fn ($record) => $record->status !== 'rejected' && $record->status !== 'approved')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->button()
                    ->icon('heroicon-o-x-circle')
                    ->action(function ($record) {
                        $record->update(['status' => 'rejected']);
                    }),
                ActionGroup::make([
                    EditAction::make(),
                    ViewAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
