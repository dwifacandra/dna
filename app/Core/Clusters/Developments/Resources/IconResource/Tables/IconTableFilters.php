<?php

namespace App\Core\Clusters\Developments\Resources\IconResource\Tables;

use App\Models\Icon;
use Filament\Tables\Filters\SelectFilter;

class IconTableFilters
{
    public static function getOptions(): array
    {
        return [
            SelectFilter::make('folder')
                ->multiple()
                ->searchable()
                ->options(function () {
                    return Icon::all()->pluck('folder', 'folder');
                }),
        ];
    }
}
