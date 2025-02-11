<?php

namespace App\Core\Clusters\Developments\Resources\VisitorResource\Tables;

use Filament\Tables\Columns\{TextColumn,};

class VisitorTableColumns
{
    public static function getOptions(): array
    {
        return [
            TextColumn::make('created_at')
                ->label('Datetime')
                ->dateTime('d/m/Y H:i:s'),
            TextColumn::make('locale')
                ->badge(),
            TextColumn::make('ip_address')
                ->label('IP Address'),
            TextColumn::make('route_info')
                ->label('Page')
                ->alignLeft()
                ->separator(',')
                ->listWithLineBreaks()
                ->url(fn($record) => $record->page_url)
                ->openUrlInNewTab(),
            TextColumn::make('browser'),
            TextColumn::make('os')
                ->label('OS'),
            TextColumn::make('user_agent')
                ->label('User Agent')
                ->separator(') ')
                ->listWithLineBreaks()
                ->alignLeft(),
        ];
    }
}
