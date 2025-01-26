<?php

namespace App\Core\Clusters\Developments\Resources\IconResource\Widgets;

use App\Models\Icon;
use Filament\Tables\{Table, Columns\TextColumn, Columns\Layout\Stack};
use Filament\Widgets\TableWidget as BaseWidget;

class IconProvider extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Icon::query()
                    ->selectRaw('folder, COUNT(name) as total')
                    ->groupBy('folder')
            )
            ->columns([
                Stack::make([
                    TextColumn::make('folder'),
                    TextColumn::make('total'),
                ])
            ])
            ->contentGrid(['default' => 2, 'xl' => 8,])
            ->paginated(false);
    }
    public function getTableRecordKey($record): string
    {
        return (string) $record->id;
    }
}
