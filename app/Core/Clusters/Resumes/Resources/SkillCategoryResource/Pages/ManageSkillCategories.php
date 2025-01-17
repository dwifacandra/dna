<?php

namespace App\Core\Clusters\Resumes\Resources\SkillCategoryResource\Pages;

use App\Core\Traits\DefaultOptions;
use Filament\Resources\Pages\ManageRecords;
use App\Core\Clusters\Resumes\Resources\SkillCategoryResource;

class ManageSkillCategories extends ManageRecords
{
    protected static string $resource = SkillCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return DefaultOptions::getDefaultHeaderActions();
    }
}
