<?php

namespace App\Core\Clusters;

use Filament\Navigation\NavigationItem;
use App\Core\Clusters\Developments\Resources\{IconResource};
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
                ...IconResource::getNavigationItems(),
                NavigationItem::make('Optimizer')
                    ->icon('core.outline.deployed_code')
                    ->url(route('dev.optimizer')),
                NavigationItem::make('Panel Optimizer')
                    ->icon('core.outline.deployed_code')
                    ->url(route('dev.panel.optimizer')),
                NavigationItem::make('Queue')
                    ->icon('core.outline.query_stats')
                    ->url(route('dev.queue')),
                NavigationItem::make('Migration')
                    ->icon('core.outline.cached')
                    ->url(route('dev.migrate')),
                NavigationItem::make('Permission')
                    ->icon('core.outline.lock_clock')
                    ->url(route('dev.permission')),
                NavigationItem::make('Storage Link')
                    ->group('Storage')
                    ->icon('core.outline.cloud')
                    ->url(route('dev.storage.link')),
                NavigationItem::make('Storage Unlink')
                    ->group('Storage')
                    ->icon('core.outline.cloud_off')
                    ->url(route('dev.storage.unlink')),
            ]);
    }
}
