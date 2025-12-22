<?php

namespace App\Filament\Resources\LicenseApplications\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LicenseApplications\LicenseApplicationResource;

class ListLicenseApplications extends ListRecords
{
    protected static string $resource = LicenseApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()
                ->icon('heroicon-o-folder')
                ->iconPosition('after'),
            'Pending' => Tab::make()
                ->icon('heroicon-o-clock')
                ->iconPosition('after')
                ->modifyQueryUsing(function (Builder $query): Builder {
                    return $query->where('status', 'pending');
                }),
            'Approved' => Tab::make()
                ->icon('heroicon-o-check-circle')
                ->iconPosition('after')
                ->modifyQueryUsing(function (Builder $query): Builder {
                    return $query->where('status', 'approved');
                }),
            'Rejected' => Tab::make()
                ->icon('heroicon-o-x-circle')
                ->iconPosition('after')
                ->modifyQueryUsing(function (Builder $query): Builder {
                    return $query->where('status', 'rejected');
                }),
            
        ];
    }
}
