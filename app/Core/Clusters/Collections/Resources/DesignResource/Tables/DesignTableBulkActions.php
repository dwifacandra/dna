<?php

namespace App\Core\Clusters\Collections\Resources\DesignResource\Tables;

use App\Core\Traits\DefaultOptions;

class DesignTableBulkActions {
    public static function getOptions(): array
    {
       return DefaultOptions::getBulkActionGroups();
    }

}
