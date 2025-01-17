<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Tables;

use App\Core\Traits\DefaultOptions;

class UserTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getActionGroups();
    }
}
