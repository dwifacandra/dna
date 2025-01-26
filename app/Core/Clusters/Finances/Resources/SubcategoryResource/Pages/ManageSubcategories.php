<?php

namespace App\Core\Clusters\Finances\Resources\SubcategoryResource\Pages;

use App\Core\Traits\DefaultOptions;
use Filament\{Resources\Pages\ManageRecords};
use App\Core\Clusters\Finances\Resources\CategoryResource;
use App\Core\Clusters\Finances\Resources\SubcategoryResource;

class ManageSubcategories extends ManageRecords
{
    protected static string $resource = SubcategoryResource::class;

    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                CategoryResource::getUrl() => CategoryResource::getNavigationLabel(),
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
