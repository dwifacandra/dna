<?php

namespace App\Core\Clusters\Finances\Resources\TransactionResource\Tables;

use App\Models\Transaction;
use Illuminate\Support\Str;
use Filament\Tables\Grouping\Group;

class TransactionTableGroups
{
    public static function getOptions(): array
    {
        return [
            Group::make('cash_flow')
                ->label('Cash Flow')
                ->titlePrefixedWithLabel(false)
                ->collapsible()
                ->getTitleFromRecordUsing(fn(Transaction $record): string => Str::upper($record->cash_flow->getLabel())),
            Group::make('category.name')
                ->label('Categories')
                ->titlePrefixedWithLabel(false)
                ->collapsible()
                ->getTitleFromRecordUsing(fn(Transaction $record): string => Str::upper($record->category->name)),
        ];
    }
}
