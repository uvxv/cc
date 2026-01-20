<?php

namespace App\Filament\Resources\ApiUsers\Pages;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\ApiUsers\ApiUserResource;

class ViewApiUser extends ViewRecord
{
    protected static string $resource = ApiUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make()
            ->authorize('delete'),
        ];
    }
}
