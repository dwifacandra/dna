<?php

namespace App\Core\Clusters\Developments\Resources\VisitorResource\Pages;

use App\Core\Clusters\Developments\Resources\VisitorResource;
use App\Core\Clusters\Developments\Resources\VisitorResource\Widgets\{LocaleChart, TrafficChart,};
use App\Core\Enums\Locale;
use Filament\Resources\Pages\ManageRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageVisitors extends ManageRecords
{
    protected static string $resource = VisitorResource::class;
    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                static::getResource()::getNavigationLabel(),
            ]);
        }
        return [];
    }
    public function getTabs(): array
    {
        return [
            'Global' => Tab::make()->icon('core.outline.public'),
            'English' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('locale', Locale::EN))
                ->icon('flags.4x3.en'),
            'Indonesian' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('locale', Locale::ID))
                ->icon('flags.4x3.id'),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            TrafficChart::class,
            LocaleChart::class,
        ];
    }
}
