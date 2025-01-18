<?php

namespace App\Core\Clusters\Resumes\Resources\SkillCategoryResource\Pages;

use App\Core\Traits\DefaultOptions;
use Filament\Resources\Pages\ManageRecords;
use App\Core\Clusters\Resumes\Resources\{SkillResource, SkillCategoryResource};

class ManageSkillCategories extends ManageRecords
{
    protected static string $resource = SkillCategoryResource::class;

    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                SkillResource::getUrl() => SkillResource::getNavigationLabel(),
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
