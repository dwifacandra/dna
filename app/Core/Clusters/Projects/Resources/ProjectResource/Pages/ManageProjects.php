<?php

namespace App\Core\Clusters\Projects\Resources\ProjectResource\Pages;

use App\Core\Traits\DefaultOptions;
use Filament\{Resources\Pages\ManageRecords};
use App\Core\Clusters\Projects\Resources\ProjectResource;
use AymanAlhattami\FilamentContextMenu\Traits\PageHasContextMenu;
use App\Core\Clusters\Projects\Resources\ProjectResource\Widgets\MonthlyBudgetChart;

class ManageProjects extends ManageRecords
{
    use PageHasContextMenu;
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
            MonthlyBudgetChart::class,
        ];
    }
}
