<?php

namespace App\Core\Clusters\Products\Resources\ProjectResource\Pages;

use App\Core\Traits\DefaultOptions;
use Filament\{Resources\Pages\ManageRecords};
use App\Core\Clusters\Products\Resources\ProjectResource;
use App\Core\Clusters\Products\Resources\ProjectResource\Widgets\TotalProjects;

class ManageProjects extends ManageRecords
{
    protected static string $resource = ProjectResource::class;

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
        return DefaultOptions::getDefaultHeaderActions(true);
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TotalProjects::class,
        ];
    }
}
