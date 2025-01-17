<?php

namespace App\Core\Clusters\Resumes\Resources\SkillCategoryResource\Tables;

use App\Core\Traits\DefaultOptions;

class SkillCategoryTableBulkActions {
    public static function getOptions(): array
    {
       return DefaultOptions::getBulkActionGroups();
    }

}
