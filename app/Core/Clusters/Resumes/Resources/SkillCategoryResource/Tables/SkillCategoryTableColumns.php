<?php

namespace App\Core\Clusters\Resumes\Resources\SkillCategoryResource\Tables;

use Filament\Tables\Columns\{Layout\Stack, TextColumn};

class SkillCategoryTableColumns
{
    public static function getOptions(): array
    {
        return [
            Stack::make([
                TextColumn::make('name')
                    ->size('2xl')
                    ->weight('bold'),
                TextColumn::make('description')
                    ->lineClamp(2),
            ])
        ];
    }
}
