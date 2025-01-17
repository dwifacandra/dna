<?php

namespace App\Core\Clusters\Developments\Resources\IconResource\Tables;

use App\Models\Icon;
use Illuminate\Support\Str;
use Filament\Tables\Grouping\Group;

class IconTableGroups
{
    public static function getOptions(): array
    {
        return [
            Group::make('folder')
                ->titlePrefixedWithLabel(false)
                ->collapsible()
                ->getTitleFromRecordUsing(fn(Icon $record): string => Str::upper($record->folder)),
        ];
    }
}
