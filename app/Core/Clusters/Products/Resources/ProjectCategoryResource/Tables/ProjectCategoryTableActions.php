<?php

namespace App\Core\Clusters\Products\Resources\ProjectCategoryResource\Tables;

use App\Core\Traits\DefaultOptions;

class ProjectCategoryTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getDefaultActions();
    }
}
