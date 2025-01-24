<?php

namespace App\Core\Clusters\Products\Resources\PortfolioResource\Tables;

use App\Models\Project;
use Illuminate\Support\Str;
use Filament\Tables\Grouping\Group;

class PortfolioTableGroups
{
    public static function getOptions(): array
    {
        return [
            Group::make('category.name')
                ->titlePrefixedWithLabel(false)
                ->collapsible()
                ->getTitleFromRecordUsing(fn(Project $record): string => Str::upper($record->category->name)),
        ];
    }
}
