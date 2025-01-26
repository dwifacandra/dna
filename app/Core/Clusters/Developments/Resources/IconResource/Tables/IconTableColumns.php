<?php

namespace App\Core\Clusters\Developments\Resources\IconResource\Tables;

use Illuminate\Support\Str;
use Filament\Tables\Columns\{IconColumn, TextColumn, Layout\Stack};

class IconTableColumns
{
    public static function getOptions(): array
    {
        return [
            Stack::make([
                IconColumn::make('preview')
                    ->icon(fn($record) => $record->name)
                    ->size('2xl'),
                TextColumn::make('name')
                    ->copyable()
                    ->copyMessage(fn(string $state): string => "Copied {$state}")
                    ->formatStateUsing(function ($state) {
                        $lastPart = Str::afterLast($state, '.');
                        return str_replace('_', ' ', $lastPart);
                    })
                    ->lineClamp(1)
                    ->extraAttributes(['class' => 'pt-2 gap-y-0']),
            ])
        ];
    }
}
