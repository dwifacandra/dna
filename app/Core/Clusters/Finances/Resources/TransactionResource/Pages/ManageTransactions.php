<?php

namespace App\Core\Clusters\Finances\Resources\TransactionResource\Pages;

use App\Core\Traits\DefaultOptions;
use Filament\Resources\Pages\ManageRecords;
use App\Core\Clusters\Finances\Resources\TransactionResource;

class ManageTransactions extends ManageRecords
{
    protected static string $resource = TransactionResource::class;

    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                static::getResource()::getNavigationLabel(),
            ]);
        }
        return [];
    }

    protected function getHeaderActions(): array
    {
        return DefaultOptions::getDefaultHeaderActions(true);
    }
}
