<?php

namespace App\Core\Clusters\Resumes\Resources\ExperienceResource\Tables;

use App\Core\Traits\DefaultOptions;
use Filament\Tables\Actions\{EditAction, DeleteAction};

class ExperienceTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getActionGroups(true);
    }
}
