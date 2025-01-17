<?php

namespace App\Core\Clusters\Projects\Resources\ProjectCategoryResource\Pages;

use App\Core\Traits\DefaultOptions;
use App\Core\Clusters\Projects\Resources\ProjectCategoryResource;
use Filament\{Resources\Pages\ManageRecords};

class ManageProjectCategories extends ManageRecords
{
    protected static string $resource = ProjectCategoryResource::class;

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
