<?php

namespace App\Filament\Resources\LicenseApplications\Pages;

use App\Filament\Resources\LicenseApplications\LicenseApplicationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLicenseApplication extends EditRecord
{
    protected static string $resource = LicenseApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
