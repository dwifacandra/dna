<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Tables;

use Filament\Tables\Columns\TextColumn;

class UserTableColumns
{
    public static function getOptions(): array
    {
        return [
            TextColumn::make('name')
                ->searchable(),
            TextColumn::make('email')
                ->searchable(),
            TextColumn::make('email_verified_at')
                ->dateTime()
                ->sortable(),
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
