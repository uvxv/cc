<?php

namespace App\Filament\Resources\LicenseApplications\Pages;

use App\Filament\Resources\LicenseApplications\LicenseApplicationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLicenseApplication extends ViewRecord
{
    protected static string $resource = LicenseApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
