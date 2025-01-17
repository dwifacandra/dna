<?php

namespace App\Core\Clusters\Resumes\Resources\CompanyResource\Tables;

use Filament\Tables\Actions\{BulkActionGroup, DeleteBulkAction};

class CompanyTableBulkActions
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
