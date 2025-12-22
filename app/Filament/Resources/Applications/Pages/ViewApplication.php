<?php

namespace App\Filament\Resources\Applications\Pages;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Notifications\ApplicationApprovedNotification;
use App\Filament\Resources\Applications\ApplicationResource;
use App\Notifications\ApplicationApproved;

class ViewApplication extends ViewRecord
{
    protected static string $resource = ApplicationResource::class;
 
    
    protected function getHeaderActions(): array
    {
        return [
            Action::make('Approve')
                ->color('success')
                ->visible(fn ($record) => $record->status !== 'approved')
                ->icon('heroicon-o-check-circle')
                ->action(function ($record){
                    $record->update(['status' => 'approved']);
                    $record->user->notify(new ApplicationApproved($record));
                }),
        ];
    }
}
