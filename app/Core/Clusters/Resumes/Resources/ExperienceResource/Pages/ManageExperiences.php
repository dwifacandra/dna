<?php

namespace App\Core\Clusters\Resumes\Resources\ExperienceResource\Pages;

use App\Core\Traits\DefaultOptions;
use Filament\{Resources\Pages\ManageRecords};
use App\Core\Clusters\Resumes\Resources\ExperienceResource;

class ManageExperiences extends ManageRecords
{
    protected static string $resource = ExperienceResource::class;

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
