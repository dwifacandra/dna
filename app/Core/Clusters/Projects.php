<?php

namespace App\Core\Clusters;

use Filament\Clusters\Cluster;
use Filament\Navigation\NavigationGroup;
use App\Core\Clusters\Projects\Resources\{ProjectResource, PortfolioResource};

class Projects extends Cluster
{
    protected static ?string $navigationIcon = 'icon-core.outline.frame_source';
    protected static ?string $navigationLabel = 'Projects';

    public static function NavigationItems()
    {
        return NavigationGroup::make(self::$navigationLabel)
            ->icon(self::$navigationIcon)
            ->collapsed()
            ->items([
                ...ProjectResource::getNavigationItems(),
                ...PortfolioResource::getNavigationItems(),
            ]);
    }
}
