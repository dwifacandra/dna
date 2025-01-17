<?php

namespace App\Core\Clusters\Peoples\Resources\CustomerResource\Tables;

use Filament\Tables\Actions\{BulkActionGroup, DeleteBulkAction};

class CustomerTableBulkActions {
    public static function getOptions(): array
    {
       return [BulkActionGroup::make([DeleteBulkAction::make(),]),];
    }

}
