<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Tables;

use Filament\Tables\Columns\{TextColumn};

class AccountsTableColumns
{
    public static function getOptions(): array
    {
        return [
            TextColumn::make('user.name'),
            TextColumn::make('name'),
            TextColumn::make('url'),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
