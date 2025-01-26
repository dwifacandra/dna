<?php

namespace App\Core\Clusters\Finances\Resources\TransactionResource\Tables;

use App\Core\Traits\DefaultOptions;

class TransactionTableBulkActions {
    public static function getOptions(): array
    {
       return DefaultOptions::getBulkActionGroups();
    }

}
