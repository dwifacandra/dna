<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Pages;

use App\Core\Traits\DefaultOptions;
use App\Core\Clusters\Peoples\Resources\UserResource;
use Filament\{Resources\Pages\ManageRecords};

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

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
