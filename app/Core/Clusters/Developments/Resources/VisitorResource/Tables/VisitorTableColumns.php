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
            TextColumn::make('user_name')
                ->label('User / Guest')
                ->badge(),
            TextColumn::make('locale')
                ->badge(),
            TextColumn::make('os')
                ->label('OS'),
            TextColumn::make('browser'),
            TextColumn::make('ip_address')
                ->label('IP Address')
                ->url(fn($record) => 'https://ip-api.com/' . $record->ip_address)
                ->openUrlInNewTab(),
            TextColumn::make('page_url')
                ->label('URL')
                ->wrap()
                ->alignLeft()
                ->url(fn($record) => $record->page_url)
                ->openUrlInNewTab(),
            TextColumn::make('page_referer')
                ->label('Referer')
                ->wrap()
                ->alignLeft()
                ->url(fn($record) => $record->page_referer)
                ->openUrlInNewTab(),
            TextColumn::make('page_path')
                ->label('Path')
                ->wrap()
                ->alignLeft(),
            TextColumn::make('route_name')
                ->label('Route Name')
                ->alignLeft(),
            TextColumn::make('route_query')
                ->label('Route Query')
                ->wrap()
                ->alignLeft(),
            TextColumn::make('user_agent')
                ->label('User Agent')
                ->wrap()
                ->alignLeft(),
        ];
    }
}
