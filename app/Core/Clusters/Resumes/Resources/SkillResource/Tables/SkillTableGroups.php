<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Tables;

use App\Models\ResumeSkill;
use Illuminate\Support\Str;
use Filament\Tables\Grouping\Group;

class SkillTableGroups
{
    public static function getOptions(): array
    {
        return [
            Group::make('user.name')
                ->titlePrefixedWithLabel(false)
                ->collapsible()
                ->getKeyFromRecordUsing(
                    fn(ResumeSkill $record): string => $record->user->name
                ),
            Group::make('category.name')
                ->titlePrefixedWithLabel(false)
                ->collapsible()
                ->getKeyFromRecordUsing(
                    fn(ResumeSkill $record): string => $record->category->name
                )
        ];
    }
}
