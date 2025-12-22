<?php

namespace App\Filament\Resources\LicenseApplications;

use App\Filament\Resources\LicenseApplications\Pages\CreateLicenseApplication;
use App\Filament\Resources\LicenseApplications\Pages\EditLicenseApplication;
use App\Filament\Resources\LicenseApplications\Pages\ListLicenseApplications;
use App\Filament\Resources\LicenseApplications\Pages\ViewLicenseApplication;
use App\Filament\Resources\LicenseApplications\Schemas\LicenseApplicationForm;
use App\Filament\Resources\LicenseApplications\Schemas\LicenseApplicationInfolist;
use App\Filament\Resources\LicenseApplications\Tables\LicenseApplicationsTable;
use App\Models\LicenseApplication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LicenseApplicationResource extends Resource 
{
    protected static ?string $model = LicenseApplication::class;

    protected static ?string $modelLabel = 'License';
    
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-identification';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return LicenseApplicationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LicenseApplicationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LicenseApplicationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLicenseApplications::route('/'),
            'create' => CreateLicenseApplication::route('/create'),
            'view' => ViewLicenseApplication::route('/{record}'),
            'edit' => EditLicenseApplication::route('/{record}/edit'),
        ];
    }
}
