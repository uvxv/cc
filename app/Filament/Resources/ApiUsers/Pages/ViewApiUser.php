<?php

namespace App\Filament\Resources\ApiUsers\Pages;

use App\Filament\Resources\ApiUsers\ApiUserResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewApiUser extends ViewRecord
{
    protected static string $resource = ApiUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
