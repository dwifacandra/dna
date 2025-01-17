<?php

namespace App\Core\Clusters\Peoples\Resources\CustomerResource\Pages;

use App\Core\Traits\DefaultOptions;
use App\Core\Clusters\Peoples\Resources\CustomerResource;
use Filament\{Resources\Pages\ManageRecords};

class ManageCustomers extends ManageRecords
{
    protected static string $resource = CustomerResource::class;

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
