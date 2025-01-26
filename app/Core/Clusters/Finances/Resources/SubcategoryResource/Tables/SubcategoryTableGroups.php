<?php

namespace App\Core\Clusters\Finances\Resources\SubcategoryResource\Tables;

use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Tables\Grouping\Group;

class SubcategoryTableGroups
{
    public static function getOptions(): array
    {
        return [
            Group::make('parent.name')
                ->titlePrefixedWithLabel(false)
                ->collapsible()
                ->getTitleFromRecordUsing(fn(Category $record): string => Str::upper($record->parent->name)),
        ];
    }
}
