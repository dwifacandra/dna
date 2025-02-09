<?php

namespace App\Core\Clusters;

use Filament\Navigation\NavigationItem;
use App\Core\Clusters\Developments\{Pages\DevOps, Resources\IconResource};
use Filament\{Clusters\Cluster, Navigation\NavigationGroup};

class Developments extends Cluster
{
    protected static ?string $navigationIcon = 'icon-core.outline.developer_board';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.developer_board';
    protected static ?string $navigationLabel = 'Development';
    public static function NavigationItems()
    {
        return NavigationGroup::make(self::$navigationLabel)
            ->icon(self::$navigationIcon)
            ->collapsed()
            ->items([
                ...DevOps::getNavigationItems(),
                ...IconResource::getNavigationItems(),
            ]);
    }
}
