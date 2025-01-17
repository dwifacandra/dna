<?php

namespace App\Core\Clusters\Resumes\Resources\ExperienceResource\Tables;

use Filament\Tables\Actions\{BulkActionGroup, DeleteBulkAction};

class ExperienceTableBulkActions {
    public static function getOptions(): array
    {
       return [BulkActionGroup::make([DeleteBulkAction::make(),]),];    }

}
