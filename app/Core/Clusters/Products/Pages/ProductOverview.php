<?php

namespace App\Core\Clusters\Products\Pages;

use App\Core\Clusters\Products;
use Filament\{Pages\Page, Pages\SubNavigationPosition};
use App\Core\Clusters\Products\Resources\{PortfolioResource\Widgets, ProjectResource\Widgets as ProjectWidgets};

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
            ProjectWidgets\TotalProjects::class,
            Widgets\BudgetPortfolioChart::class,
            Widgets\TotalPortfolioChart::class,
        ];
    }
}
