<?php

namespace App\Core\Clusters\Peoples\Resources\CustomerResource\Forms;

use Filament\Forms\Components\{TextInput,};

class CustomerFormSchemes
{
    public static function getOptions(): array
    {
        return [
            TextInput::make('name'),
            TextInput::make('phone'),
        ];
    }
}
