<?php

namespace App\Core\Clusters;

use Filament\Clusters\Cluster;
use Filament\Navigation\NavigationGroup;
use App\Core\Clusters\Resumes\Resources\{CompanyResource, ExperienceResource, SkillResource};

class Resumes extends Cluster
{
    protected static ?string $navigationIcon = 'icon-core.outline.picture_as_pdf';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.picture_as_pdf';
    protected static ?string $navigationLabel = 'Resume';

    public static function NavigationItems()
    {
        return NavigationGroup::make(self::$navigationLabel)
            ->icon(self::$navigationIcon)
            ->collapsed()
            ->items([
                ...CompanyResource::getNavigationItems(),
                ...ExperienceResource::getNavigationItems(),
                ...SkillResource::getNavigationItems(),
            ]);
    }
}
