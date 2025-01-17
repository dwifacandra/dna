<?php

namespace App\Core\Clusters;

use Filament\Clusters\Cluster;
use Filament\Navigation\NavigationGroup;
use App\Core\Clusters\Peoples\Resources\{CustomerResource, UserResource};

class Peoples extends Cluster
{
    protected static ?string $navigationIcon = 'icon-core.fill.frame_person';
    protected static ?string $navigationLabel = 'People';

    public static function NavigationItems()
    {
        return NavigationGroup::make(self::$navigationLabel)
            ->icon(self::$navigationIcon)
            ->collapsed()
            ->items([
                ...CustomerResource::getNavigationItems(),
                ...UserResource::getNavigationItems(),
            ]);
    }
}
