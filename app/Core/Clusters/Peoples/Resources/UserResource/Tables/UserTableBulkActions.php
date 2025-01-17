<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Tables;

use Filament\Tables\Actions\{BulkActionGroup, DeleteBulkAction};

class UserTableBulkActions
{
    public static function getOptions(): array
    {
        return [
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ];
    }
}
