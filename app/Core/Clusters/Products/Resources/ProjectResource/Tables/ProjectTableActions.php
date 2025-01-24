<?php

namespace App\Core\Clusters\Products\Resources\ProjectResource\Tables;

use App\Core\Traits\DefaultOptions;

class ProjectTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getActionGroups(true);
    }
}
