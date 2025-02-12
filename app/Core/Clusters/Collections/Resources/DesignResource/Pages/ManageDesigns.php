<?php

namespace App\Core\Clusters\Collections\Resources\DesignResource\Pages;

use App\Core\Clusters\Collections\Resources\DesignResource;
use App\Core\Traits\DefaultOptions;
use Filament\Resources\Pages\ManageRecords;

class ManageDesigns extends ManageRecords
{
    protected static string $resource = DesignResource::class;

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
