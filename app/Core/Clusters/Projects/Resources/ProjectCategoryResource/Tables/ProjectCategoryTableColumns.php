<?php

namespace App\Core\Clusters\Projects\Resources\ProjectCategoryResource\Tables;

use Filament\Tables\Columns\{Layout\Split, TextColumn};

class ProjectCategoryTableColumns
{
    public static function getOptions(): array
    {
        return [
            Split::make([
                TextColumn::make('name')
                    ->size('2xl'),
                TextColumn::make('total')
                    ->badge()
                    ->alignEnd(),
            ])
        ];
    }
}
