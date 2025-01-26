<?php

namespace App\Core\Clusters;

use Filament\{Clusters\Cluster, Navigation\NavigationGroup};
use App\Core\Clusters\{
    Products\Pages\ProductOverview,
    Products\Resources\ProjectResource,
    Products\Resources\PortfolioResource
};

class Products extends Cluster
{
    protected static ?string $navigationIcon = 'icon-core.outline.deployed_code';
    protected static ?string $navigationLabel = 'Products';
    public static function NavigationItems()
    {
        return NavigationGroup::make(self::$navigationLabel)
            ->icon(self::$navigationIcon)
            ->collapsed()
            ->items([
                ...ProductOverview::getNavigationItems(),
                ...ProjectResource::getNavigationItems(),
                ...PortfolioResource::getNavigationItems(),
            ]);
    }
}
