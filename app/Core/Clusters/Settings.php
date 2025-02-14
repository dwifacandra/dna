<?php

namespace App\Core\Clusters;

use BezhanSalleh\FilamentShield\Resources\RoleResource;
use Filament\{Clusters\Cluster, Navigation\NavigationGroup};

class Settings extends Cluster
{
    protected static ?string $navigationIcon = 'icon-core.outline.settings';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.settings';
    protected static ?string $navigationLabel = 'Setting';

    public static function NavigationItems()
    {
        return NavigationGroup::make(self::$navigationLabel)
            ->icon(self::$navigationIcon)
            ->collapsed()
            ->items([
                ...RoleResource::getNavigationItems(),
            ]);
    }
}
