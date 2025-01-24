<?php

namespace App\Core\Clusters\Settings\Resources\NavigationResource\Tables;

use App\Core\Traits\DefaultOptions;

class NavigationTableActions {
    public static function getOptions(): array
    {
       return DefaultOptions::getActionGroups();
    }

}
