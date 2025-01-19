<?php

namespace App\Core\Clusters\Projects\Resources\PortfolioResource\Tables;

use Illuminate\Support\Str;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\{Layout\Split, Layout\Stack, ImageColumn, TextColumn};

class PortfolioTableColumns
{
    public static function getOptions(): array
    {
        return [
            Split::make([
                ImageColumn::make('thumbnail')
                    ->defaultImageUrl(url('/img/image.svg'))
                    ->size(64)
                    ->alignCenter(),
                Stack::make([
                    TextColumn::make('name'),
                    TextColumn::make('category.name')
                        ->badge(),
                    TextColumn::make('budget')
                        ->badge()
                        ->money('IDR', locale: 'id_ID'),
                ]),
            ]),
        ];
    }
}
