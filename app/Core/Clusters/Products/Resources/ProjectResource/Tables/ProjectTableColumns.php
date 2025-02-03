<?php

namespace App\Core\Clusters\Products\Resources\ProjectResource\Tables;

use App\Models\Project;
use Illuminate\Support\{Str, Collection};
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\{IconColumn, TextColumn, SpatieMediaLibraryImageColumn};

class ProjectTableColumns
{
    public static function getOptions(): array
    {
        return [
            SpatieMediaLibraryImageColumn::make('Cover')
                ->collection('projects')
                ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'cover'))
                ->size(64),
            TextColumn::make('name')
                ->alignment(Alignment::Left)
                ->description(
                    fn($record) => Str::limit(strip_tags(
                        $record->description
                    ), 50)
                ),
            TextColumn::make('category.name')
                ->badge()
                ->alignment('center'),
            TextColumn::make('status')
                ->badge()
                ->alignment('center'),
            TextColumn::make('priority')
                ->badge()
                ->alignment('center'),
            IconColumn::make('featured')
                ->boolean()
                ->alignment('center'),
            IconColumn::make('release')
                ->boolean()
                ->alignment('center'),
            TextColumn::make('user.name'),
            TextColumn::make('url')
                ->wrap()
                ->lineClamp(2)
                ->alignment(Alignment::Left)
                ->toggleable(isToggledHiddenByDefault: true)
                ->url(
                    fn(Project $record): string =>
                    $record->url ?? '',
                    shouldOpenInNewTab: true
                ),
            TextColumn::make('repository')
                ->wrap()
                ->lineClamp(2)
                ->alignment(Alignment::Left)
                ->toggleable(isToggledHiddenByDefault: true)
                ->url(
                    fn(Project $record): string =>
                    $record->repository ?? '',
                    shouldOpenInNewTab: true
                ),
            TextColumn::make('start_date')
                ->date('d/m/Y'),
            TextColumn::make('end_date')
                ->date('d/m/Y'),
            TextColumn::make('created_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
