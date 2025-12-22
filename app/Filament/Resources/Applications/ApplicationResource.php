<?php

namespace App\Filament\Resources\Applications;

use BackedEnum;
use Filament\Tables\Table;
use App\Models\Application;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Applications\Pages\EditApplication;
use App\Filament\Resources\Applications\Pages\ViewApplication;
use App\Filament\Resources\Applications\Pages\ListApplications;
use App\Filament\Resources\Applications\Pages\CreateApplication;
use App\Filament\Resources\Applications\Schemas\ApplicationForm;
use App\Filament\Resources\Applications\Tables\ApplicationsTable;
use Dom\Text;
use Filament\Infolists\Components\ImageEntry;
use Tests\TestCase;
 
class ApplicationResource extends Resource 
{
    protected static ?string $model = Application::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Document;

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ApplicationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApplicationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Applicant Details')
                    
                    ->components([
                        TextEntry::make('Applicant Name')
                            ->label('Full Name')
                            ->weight('bold')
                            ->state(fn (Application $record) => $record->user->first_name.' '.$record->user->last_name),
                        TextEntry::make('user.email')
                            ->label('Email Address')
                            ->weight('bold'),
                        TextEntry::make('phone')
                            ->label('Phone Number')
                            ->weight('bold'),
                        TextEntry::make('user.address')
                            ->label('Address')
                            ->weight('bold'),
                        ImageEntry::make('user.image')
                            ->label('Applicant NIC')
                            ->disk('public'),
                    
                    ])->columnSpan(2),
                Section::make('Application Details')
                    ->components([
                        TextEntry::make('province')
                            ->label('Province')
                            ->weight('bold'),
                        TextEntry::make('area')
                            ->label('Medical Office Area')
                            ->weight('bold'),
                        TextEntry::make('blood_type')
                            ->label('Blood Type')
                            ->weight('bold'),
                        TextEntry::make('vehicle_group')
                            ->label('Vehicle Group')
                            ->weight('bold'),
                        ImageEntry::make('medical_image')
                            ->label('Medical Report')
                            ->disk('public'),
                    ])->columnSpan(2),
            ])->columns(4);
    }
    public static function getPages(): array
    {
        return [
            'index' => ListApplications::route('/'),
            'create' => CreateApplication::route('/create'),
            'edit' => EditApplication::route('/{record}/edit'),
            'view' => ViewApplication::route('/{record}'),
        ];
    }

    
}
