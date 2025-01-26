<?php

namespace App\Core\Clusters\Finances\Resources\TransactionResource\Tables;

use App\Core\Traits\DefaultOptions;

class TransactionTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getActionGroups(true);
    }
}
