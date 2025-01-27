<?php

namespace App\Core\Clusters\Finances\Resources\TransactionResource\Tables;

use Illuminate\Support\Str;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\{TextColumn,};
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class TransactionTableColumns
{
    public static function getOptions(): array
    {
        return [
            TextColumn::make('cash_flow')
                ->badge()
                ->alignment(Alignment::Center),
            TextColumn::make('transaction_id')
                ->label('Transaction ID')
                ->icon('fa.solid.key')
                ->badge()
                ->copyable(),
            TextColumn::make('name')
                ->label('Transaction Name')
                ->alignment(Alignment::Left)
                ->description(
                    fn($record) => Str::limit(strip_tags(
                        $record->description
                    ), 50)
                ),
            TextColumn::make('amount')
                ->money('IDR', locale: 'id_ID')
                ->alignment(Alignment::Center),
            TextColumn::make('date')
                ->label('Transaction Date')
                ->date('l, d F Y')
                ->alignment(Alignment::Center),
            TextColumn::make('payee.name'),
            TextColumn::make('category.name')
                ->badge()
                ->grow(false)
                ->icon(fn($record) => $record->category->icon),
            TextColumn::make('subcategory.name')
                ->badge()
                ->grow(false)
                ->icon(fn($record) => $record->subcategory->icon),
            SpatieMediaLibraryImageColumn::make('attachment')
                ->collection('transactions')
                ->visibility('private')
                ->size(64)
                ->stacked(),
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
