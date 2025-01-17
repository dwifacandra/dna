<?php

namespace App\Core\Clusters\Resumes\Resources\ExperienceResource\Tables;

use App\Models\ResumeExperience;
use Filament\Tables\Grouping\Group;

class ExperienceTableGroups
{
    public static function getOptions(): array
    {
        return [
            Group::make('company.name')
                ->titlePrefixedWithLabel(false)
                ->getKeyFromRecordUsing(
                    fn(ResumeExperience $record): string => $record->company->name
                ),
        ];
    }
}
