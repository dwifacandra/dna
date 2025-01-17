<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Forms;

use Filament\Forms\Components\{TextInput, Select};

class AccountFormSchemes
{
    public static function getOptions(): array
    {
        return [
            TextInput::make('name')
                ->label('Account Name'),
            TextInput::make('url')
                ->label('Account Url'),
        ];
    }
}
