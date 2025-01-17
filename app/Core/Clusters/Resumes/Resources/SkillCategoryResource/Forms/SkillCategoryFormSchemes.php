<?php

namespace App\Core\Clusters\Resumes\Resources\SkillCategoryResource\Forms;

use Filament\Forms\Components\{TextInput, MarkdownEditor};

class SkillCategoryFormSchemes
{
    public static function getOptions(): array
    {
        return [
            TextInput::make('name')->required(),
            MarkdownEditor::make('description')->columnSpanFull(),
        ];
    }
}
