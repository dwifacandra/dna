<?php

namespace App\Core\Clusters\Collections\Resources\AnimationResource\Tables;

use App\Core\Traits\DefaultOptions;

class AnimationTableBulkActions {
    public static function getOptions(): array
    {
       return DefaultOptions::getBulkActionGroups();
    }

}
