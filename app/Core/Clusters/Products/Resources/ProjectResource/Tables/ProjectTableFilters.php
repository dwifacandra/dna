<?php

namespace App\Core\Clusters\Products\Resources\ProjectResource\Tables;

use App\Core\Enums\ProjectStatus;
use App\Core\Enums\ProjectPriority;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class ProjectTableFilters
{
    public static function getOptions(): array
    {
        return [
            SelectFilter::make('category.name')
                ->relationship('category', 'name')
                ->multiple()
                ->preload()
                ->native(false),
            SelectFilter::make('status')
                ->options(ProjectStatus::class)
                ->multiple()
                ->native(false),
            SelectFilter::make('priority')
                ->options(ProjectPriority::class)
                ->multiple()
                ->native(false),
            Filter::make('featured')
                ->toggle()
                ->query(fn($query, $state) => $query->where('featured', $state ? 1 : 0)),
        ];
    }
}
