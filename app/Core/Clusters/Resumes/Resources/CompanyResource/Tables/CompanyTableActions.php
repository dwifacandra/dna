<?php

namespace App\Core\Clusters\Resumes\Resources\CompanyResource\Tables;

use Filament\Tables\Actions\{EditAction, DeleteAction};

class CompanyTableActions
{
    public static function getOptions(): array
    {
        return [
            EditAction::make()->slideOver(),
            DeleteAction::make(),
        ];
    }
}
