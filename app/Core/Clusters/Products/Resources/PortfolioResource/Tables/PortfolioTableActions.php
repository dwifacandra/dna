<?php

namespace App\Core\Clusters\Products\Resources\PortfolioResource\Tables;

use App\Core\Traits\DefaultOptions;

class PortfolioTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getActionGroups(true);
    }
}
