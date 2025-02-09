<?php

namespace App\Core\Clusters;

use Filament\{Clusters\Cluster, Navigation\NavigationGroup};
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource;

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
                ...PermissionResource::getNavigationItems(),
            ]);
    }
}
