<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Tables;

use Filament\Tables\Actions\{BulkActionGroup, DeleteBulkAction};

class SkillTableBulkActions {
    public static function getOptions(): array
    {
       return [BulkActionGroup::make([DeleteBulkAction::make(),]),];    }

}
