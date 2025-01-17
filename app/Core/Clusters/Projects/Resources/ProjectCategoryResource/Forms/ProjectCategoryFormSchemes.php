<?php

namespace App\Core\Clusters\Projects\Resources\ProjectCategoryResource\Forms;

use Filament\Forms\Components\{TextInput};

class ProjectCategoryFormSchemes
{
    public static function getOptions(): array
    {
        return [
            TextInput::make('name')
                ->required(),
        ];
    }
}
