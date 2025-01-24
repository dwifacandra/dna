<?php

namespace App\Core\Clusters;

use Filament\Clusters\Cluster;
use Filament\Navigation\NavigationGroup;
use App\Core\Clusters\Finances\Resources\TransactionResource;

class Finances extends Cluster
{
    protected static ?string $navigationIcon = 'icon-core.outline.universal_currency';
    protected static ?string $navigationLabel = 'Finances';

    public static function NavigationItems()
    {
        return NavigationGroup::make(self::$navigationLabel)
            ->icon(self::$navigationIcon)
            ->collapsed()
            ->items([
                ...TransactionResource::getNavigationItems(),
            ]);
    }
}
