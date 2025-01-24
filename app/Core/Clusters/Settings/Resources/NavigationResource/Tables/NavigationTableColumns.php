<?php

namespace App\Core\Clusters\Settings\Resources\NavigationResource\Tables;

use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\{Layout\Split, IconColumn, TextColumn};

class NavigationTableColumns
{
    public static function getOptions(): array
    {
        return [
            IconColumn::make('icon')
                ->icon(fn($record) => $record->icon),
            TextColumn::make('label')
                ->alignment(Alignment::Left),
            TextColumn::make('url')
                ->alignment(Alignment::Left),
            TextColumn::make('position')
                ->badge(),
            TextColumn::make('icon_position')
                ->badge(),
            IconColumn::make('icon_only')
                ->boolean(),
            IconColumn::make('active')
                ->boolean(),
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
