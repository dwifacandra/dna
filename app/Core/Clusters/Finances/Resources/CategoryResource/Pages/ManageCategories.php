<?php

namespace App\Core\Clusters\Finances\Resources\CategoryResource\Pages;

use Filament\Actions\Action;
use App\Core\Traits\DefaultOptions;
use Filament\{Resources\Pages\ManageRecords};
use App\Core\Clusters\Finances\Resources\CategoryResource;
use App\Core\Clusters\Finances\Resources\SubcategoryResource;

class ManageCategories extends ManageRecords
{
    protected static string $resource = CategoryResource::class;
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
        return DefaultOptions::getDefaultHeaderActions(false, [
            Action::make('Subcategory')
                ->icon('core.fill.category')
                ->iconSize('sm')
                ->color('gray')
                ->url(SubcategoryResource::getUrl())
        ]);
    }
}
