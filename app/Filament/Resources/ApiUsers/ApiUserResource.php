<?php

namespace App\Filament\Resources\ApiUsers;

use App\Filament\Resources\ApiUsers\Pages\CreateApiUser;
use App\Filament\Resources\ApiUsers\Pages\EditApiUser;
use App\Filament\Resources\ApiUsers\Pages\ListApiUsers;
use App\Filament\Resources\ApiUsers\Pages\ViewApiUser;
use App\Filament\Resources\ApiUsers\Schemas\ApiUserForm;
use App\Filament\Resources\ApiUsers\Schemas\ApiUserInfolist;
use App\Filament\Resources\ApiUsers\Tables\ApiUsersTable;
use App\Models\ApiUser;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ApiUserResource extends Resource
{
    protected static ?string $model = ApiUser::class;

    protected static ?string $modelLabel = 'License';

    protected static ?int $navigationSort = 5;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'ApiUser';

    public static function form(Schema $schema): Schema
    {
        return ApiUserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ApiUserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApiUsersTable::configure($table);
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
            'index' => ListApiUsers::route('/'),
            'create' => CreateApiUser::route('/create'),
            'view' => ViewApiUser::route('/{record}'),
            'edit' => EditApiUser::route('/{record}/edit'),
        ];
    }
}
