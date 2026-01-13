<?php

namespace App\Filament\Resources\Admins\Pages;

use App\Models\Admin;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Admins\AdminResource;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;

}
