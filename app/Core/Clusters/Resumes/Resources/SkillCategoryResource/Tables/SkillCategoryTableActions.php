<?php

namespace App\Core\Clusters\Resumes\Resources\SkillCategoryResource\Tables;

use App\Core\Traits\DefaultOptions;

class SkillCategoryTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getDefaultActions();
    }
}
