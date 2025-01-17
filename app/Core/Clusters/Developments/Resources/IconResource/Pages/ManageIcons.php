<?php

namespace App\Core\Clusters\Developments\Resources\IconResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use App\Core\Clusters\Developments\Resources\{IconResource, IconResource\Widgets\IconProvider};

class ManageIcons extends ManageRecords
{
    protected static string $resource = IconResource::class;

    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                static::getResource()::getNavigationLabel(),
            ]);
        }
        return [];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            IconProvider::class,
        ];
    }
}
