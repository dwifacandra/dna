<?php

namespace App\Core\Clusters\Products\Resources\ProjectResource\Tables;

use App\Core\Traits\DefaultOptions;

class ProjectTableBulkActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getBulkActionGroups();
    }
}
