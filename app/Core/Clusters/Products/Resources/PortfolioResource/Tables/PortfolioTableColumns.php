<?php

namespace App\Core\Clusters\Products\Resources\PortfolioResource\Tables;

use App\Models\Project;
use Illuminate\Support\Str;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\{IconColumn,  TextColumn};

class PortfolioTableColumns
{
    public static function getOptions(): array
    {
        return [
            SpatieMediaLibraryImageColumn::make('thumbnail')
                ->defaultImageUrl(url('/img/image.svg'))
                ->collection('projects')
                ->size(64),
            TextColumn::make('name')
                ->alignment(Alignment::Left)
                ->description(
                    fn($record) => Str::limit(strip_tags(
                        $record->description
                    ), 50)
                ),
            TextColumn::make('price')
                ->money('IDR', locale: 'id_ID'),
            IconColumn::make('featured')
                ->boolean(),
            TextColumn::make('end_date')
                ->label('Release Date')
                ->date('d F Y'),
            TextColumn::make('category.name')
                ->badge(),
            TextColumn::make('url')
                ->wrap()
                ->label('Demo Url')
                ->lineClamp(2)
                ->alignment(Alignment::Left)
                ->url(
                    fn(Project $record): string =>
                    $record->url ?? '',
                    shouldOpenInNewTab: true
                ),
            TextColumn::make('created_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
