<?php

namespace App\Core\Clusters\Settings\Resources\NavigationResource\Pages;

use Filament\Actions;
use App\Core\Traits\DefaultOptions;
use Filament\Resources\Pages\ManageRecords;
use App\Core\Clusters\Settings\Resources\NavigationResource;

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
        return DefaultOptions::getDefaultHeaderActions();
    }
}
