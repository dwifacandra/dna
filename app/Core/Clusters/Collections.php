<?php

namespace App\Core\Clusters;

use App\Core\Clusters\Collections\Resources\{AnimationResource, DesignResource};
use Filament\Clusters\Cluster;
use Filament\Navigation\NavigationGroup;

class Collections extends Cluster
{
    protected static ?string $navigationIcon = 'icon-core.outline.library_books';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.library_books';
    protected static ?string $navigationLabel = 'Collections';
    public static function NavigationItems()
    {
        return NavigationGroup::make(self::$navigationLabel)
            ->icon(self::$navigationIcon)
            ->collapsed()
            ->items([
                ...AnimationResource::getNavigationItems(),
                ...DesignResource::getNavigationItems(),
            ]);
    }
}
