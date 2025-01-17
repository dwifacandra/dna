<?php

namespace App\Core\Clusters\Projects\Resources\ProjectCategoryResource\Tables;

use App\Core\Traits\DefaultOptions;

class ProjectCategoryTableBulkActions {
    public static function getOptions(): array
    {
       return DefaultOptions::getBulkActionGroups();
    }

}
