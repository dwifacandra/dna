<?php

namespace App\Core\Clusters\Projects\Resources\ProjectResource\Tables;

use Illuminate\Support\Str;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\{IconColumn, ImageColumn, TextColumn};

class ProjectTableColumns
{
    public static function getOptions(): array
    {
        return [
            ImageColumn::make('thumbnail')
                ->defaultImageUrl(url('/img/image.svg'))
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
            TextColumn::make('budget')
                ->money('IDR', locale: 'id_ID'),
            TextColumn::make('status')
                ->badge()
                ->alignment('center'),
            TextColumn::make('priority')
                ->badge()
                ->alignment('center'),
            IconColumn::make('publish_to_portfolio')
                ->boolean()
                ->label('Portfolio')
                ->alignment('center'),
            TextColumn::make('user.name'),
            TextColumn::make('customer.name'),
            TextColumn::make('url')
                ->wrap()
                ->lineClamp(2)
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('repository')
                ->wrap()
                ->lineClamp(2)
                ->toggleable(isToggledHiddenByDefault: true),
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
