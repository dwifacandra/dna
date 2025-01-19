<?php

namespace App\Core\Clusters\Projects\Resources\PortfolioResource\Pages;

use App\Core\Traits\DefaultOptions;
use Filament\{Resources\Pages\ManageRecords};
use App\Core\Clusters\Projects\Resources\PortfolioResource;
use App\Core\Clusters\Projects\Resources\PortfolioResource\{Widgets};

class ManagePortfolio extends ManageRecords
{
    protected static string $resource = PortfolioResource::class;

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
            Widgets\TotalPortfolioChart::class,
            Widgets\BudgetPortfolioChart::class,
        ];
    }
}
