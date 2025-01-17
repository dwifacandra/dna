<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Pages;

use App\Core\Traits\DefaultOptions;
use App\Core\Clusters\Resumes\Resources\SkillResource;
use Filament\{Resources\Pages\ManageRecords};

class ManageSkills extends ManageRecords
{
    protected static string $resource = SkillResource::class;

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
        return DefaultOptions::getDefaultHeaderActions();
    }
}
