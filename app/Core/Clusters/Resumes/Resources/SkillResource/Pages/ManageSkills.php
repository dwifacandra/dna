<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Pages;

use App\Core\Clusters\Resumes\Resources\SkillCategoryResource;
use Filament\Actions\Action;
use App\Core\Traits\DefaultOptions;
use Filament\{Resources\Pages\ManageRecords};
use App\Core\Clusters\Resumes\Resources\SkillResource;

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
        return DefaultOptions::getDefaultHeaderActions(false, [
            Action::make('Category')
                ->icon('core.outline.category')
                ->color('gray')
                ->url(SkillCategoryResource::getUrl())
        ]);
    }
}
