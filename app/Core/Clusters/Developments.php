<?php

namespace App\Core\Clusters;

use Filament\Clusters\Cluster;
use Filament\Navigation\NavigationGroup;
use App\Core\Clusters\Developments\Resources\{IconResource};

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
                ...IconResource::getNavigationItems(),
            ]);
    }
}
