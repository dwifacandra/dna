<?php

namespace App\Core\Clusters\Peoples\Resources\CustomerResource\Tables;

use Filament\Tables\Columns\{TextColumn,};

class CustomerTableColumns
{
    public static function getOptions(): array
    {
        return [
            TextColumn::make('name'),
            TextColumn::make('phone'),
            TextColumn::make('created_at')
                ->dateTime('d/m/Y h:m:s')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('updated_at')
                ->dateTime('d/m/Y h:m:s')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: false),
        ];
    }
}
