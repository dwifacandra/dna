<?php

namespace App\Core\Clusters\Resumes\Resources\CompanyResource\Pages;

use App\Core\Traits\DefaultOptions;
use App\Core\Clusters\Resumes\Resources\CompanyResource;
use Filament\{Resources\Pages\ManageRecords};

class ManageCompanies extends ManageRecords
{
    protected static string $resource = CompanyResource::class;

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
