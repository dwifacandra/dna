<?php

namespace App\Core\Clusters\Products\Pages;

use Filament\Pages\Page;
use App\Core\Clusters\Products;
use App\Core\Clusters\Products\Resources\PortfolioResource\Widgets\BudgetPortfolioChart;
use App\Core\Clusters\Products\Resources\PortfolioResource\Widgets\TotalPortfolioChart;
use App\Core\Clusters\Products\Resources\ProjectResource\Widgets\TotalProjects;
use Filament\Pages\SubNavigationPosition;

class ProductOverview extends Page
{
    protected static string $view = 'core.clusters.products.pages.product-overview';
    protected static ?string $cluster = Products::class;
    protected static ?string $navigationIcon = 'icon-core.outline.monitoring';
    protected static ?string $navigationLabel = 'Overviews';
    protected static ?string $slug = 'overviews';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                static::getNavigationLabel(),
            ]);
        }
        return [];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TotalProjects::class,
            BudgetPortfolioChart::class,
            TotalPortfolioChart::class,
        ];
    }
}
