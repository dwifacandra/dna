<?php

namespace App\Core\Clusters\Finances\Resources\CategoryResource\Tables;

use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Tables\Grouping\Group;

class CategoryTableGroups
{
    public static function getOptions(): array
    {
        return [
            Group::make('type')
                ->titlePrefixedWithLabel(false)
                ->collapsible()
                ->getTitleFromRecordUsing(fn(Category $record): string => Str::upper($record->type)),
        ];
    }
}
