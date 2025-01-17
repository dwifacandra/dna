<?php

namespace App\Core\Clusters\Projects\Resources\ProjectResource\Tables;

use App\Core\Traits\DefaultOptions;

class ProjectTableBulkActions {
    public static function getOptions(): array
    {
       return DefaultOptions::getBulkActionGroups();
    }

}
