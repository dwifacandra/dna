<?php

namespace App\Core\Clusters\Finances\Resources\TransactionResource\Tables;

use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\{TextColumn,};

class TransactionTableColumns
{
    public static function getOptions(): array
    {
        return [
            TextColumn::make('date')
                ->date('d/m/Y')
                ->alignment(Alignment::Center),
            TextColumn::make('name'),
            TextColumn::make('amount')
                ->money('IDR', locale: 'id_ID')
                ->alignment(Alignment::Center),
            TextColumn::make('cash_flow')
                ->badge()
                ->alignment(Alignment::Center),
            TextColumn::make('category.name'),
            TextColumn::make('subcategory.name'),
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
