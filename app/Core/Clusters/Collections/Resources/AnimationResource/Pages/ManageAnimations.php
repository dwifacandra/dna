<?php

namespace App\Core\Clusters\Collections\Resources\AnimationResource\Pages;

use App\Core\Clusters\Collections\Resources\AnimationResource;
use App\Core\Traits\DefaultOptions;
use Filament\Resources\Pages\ManageRecords;

class ManageAnimations extends ManageRecords
{
    protected static string $resource = AnimationResource::class;
    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                static::getResource()::getNavigationLabel(),
            ]);
        }
        return [];
    }
    protected function getHeaderActions(): array
    {
        return DefaultOptions::getDefaultHeaderActions(true);
    }
}
