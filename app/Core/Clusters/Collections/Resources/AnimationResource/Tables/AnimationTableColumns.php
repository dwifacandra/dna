<?php

namespace App\Core\Clusters\Collections\Resources\AnimationResource\Tables;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\{Layout\Split, Layout\Stack, ImageColumn, TextColumn};

class AnimationTableColumns
{
    public static function getOptions(): array
    {
        return [
            SpatieMediaLibraryImageColumn::make('Cover')
                ->collection('collections')
                ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'cover'))
                ->size(40),
            TextColumn::make('title')
                ->alignLeft()
                ->description(
                    fn($record) => Str::limit(strip_tags(
                        $record->description
                    ), 50)
                ),
            TextColumn::make('category.name')
                ->badge(),
            TextColumn::make('status')
                ->badge(),
            TextColumn::make('tags')
                ->badge()
                ->alignLeft()
                ->separator(',')
                ->limitList(3),
            TextColumn::make('keywords')
                ->badge()
                ->alignLeft()
                ->separator(',')
                ->limitList(3),
            TextColumn::make('created_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
