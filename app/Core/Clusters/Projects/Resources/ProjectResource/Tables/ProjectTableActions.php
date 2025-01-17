<?php

namespace App\Core\Clusters\Projects\Resources\ProjectResource\Tables;

use App\Models\Project;
use App\Core\Traits\DefaultOptions;
use Filament\Tables\Actions\ViewAction;

class ProjectTableActions
{
    public static function getOptions(): array
    {
        return DefaultOptions::getActionGroups(true);
    }
}
