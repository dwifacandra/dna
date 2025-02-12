<?php

namespace App\Core\Clusters\Collections\Resources\AnimationResource\Tables;

use App\Core\Traits\DefaultOptions;

class AnimationTableActions {
    public static function getOptions(): array
    {
       return DefaultOptions::getActionGroups();
    }

}
