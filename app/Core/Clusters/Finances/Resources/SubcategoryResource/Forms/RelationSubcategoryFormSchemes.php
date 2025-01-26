<?php

namespace App\Core\Clusters\Finances\Resources\SubcategoryResource\Forms;

use App\Core\Enums\CashFlow;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\{TextInput, Hidden,  ToggleButtons, Select,  Split};

class RelationSubcategoryFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Hidden::make('scope')
                ->default('transaction'),
            Hidden::make('type')
                ->default(fn($get) => $get('../../type')),
            Hidden::make('parent_id')
                ->default(fn($get) => $get('../../id')),
            TextInput::make('name')
                ->required(),
        ];
    }
}
