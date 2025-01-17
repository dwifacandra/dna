<?php

namespace App\Core\Clusters\Peoples\Resources\CustomerResource\Tables;

use App\Core\Traits\DefaultOptions;

class CustomerTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getActionGroups();
    }
}
