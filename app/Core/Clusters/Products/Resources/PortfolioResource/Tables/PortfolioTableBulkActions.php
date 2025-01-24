<?php

namespace App\Core\Clusters\Products\Resources\PortfolioResource\Tables;

use App\Core\Traits\DefaultOptions;

class PortfolioTableBulkActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getBulkActionGroups();
    }
}
