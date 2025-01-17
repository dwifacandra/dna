<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Tables;

use App\Models\ResumeSkill;
use Filament\Tables\Grouping\Group;

class SkillTableGroups
{
    public static function getOptions(): array
    {
        return [
            Group::make('user.name')
                ->titlePrefixedWithLabel(false)
                ->getKeyFromRecordUsing(
                    fn(ResumeSkill $record): string => $record->user->name
                ),
        ];
    }
}
