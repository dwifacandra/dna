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
                ->size(IconColumn\IconColumnSize::Medium)
                ->icon(fn($record) => $record->icon),
            TextColumn::make('rating')
                ->badge(),
            TextColumn::make('user.name')
                ->alignment(Alignment::Left),
            TextColumn::make('created_at')
                ->dateTime('d/m/Y H:i:s'),
            TextColumn::make('updated_at')
                ->dateTime('d/m/Y H:i:s'),
        ];
    }
}
