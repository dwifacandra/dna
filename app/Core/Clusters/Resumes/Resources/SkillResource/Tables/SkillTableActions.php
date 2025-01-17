<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Tables;

use App\Core\Traits\DefaultOptions;

class SkillTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getActionGroups();
    }
}
