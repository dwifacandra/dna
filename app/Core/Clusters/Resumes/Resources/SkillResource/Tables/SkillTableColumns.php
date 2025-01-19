<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Tables;

use Filament\{Support\Colors\Color, Support\Enums\Alignment};
use Filament\Tables\Columns\{IconColumn, TextColumn};

class SkillTableColumns
{
    public static function getOptions(): array
    {
        return [
            TextColumn::make('category.name')
                ->alignment(Alignment::Left),
            TextColumn::make('name')
                ->alignment(Alignment::Left),
            IconColumn::make('icon')
                ->icon(fn($record) => $record->icon)
                ->color(fn($record) => Color::hex($record->icon_color)),
            TextColumn::make('rate')
                ->badge()
                ->icon('icon-core.outline.star'),
            TextColumn::make('user.name')
                ->alignment(Alignment::Left),
            TextColumn::make('created_at')
                ->dateTime('d/m/Y H:i:s'),
            TextColumn::make('updated_at')
                ->dateTime('d/m/Y H:i:s'),
        ];
    }
}
