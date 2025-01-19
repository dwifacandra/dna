<?php

namespace App\Core\Clusters\Settings\Resources\NavigationResource\Pages;

use App\Core\Clusters\Settings\Resources\NavigationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageNavigations extends ManageRecords
{
    protected static string $resource = NavigationResource::class;

    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                static::getResource()::getNavigationLabel(),
            ]);
        }
        return [];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
