<?php

namespace App\Core\Clusters\Collections\Resources\DesignResource\Tables;

use Filament\Tables\Columns\{Layout\Split, Layout\Stack, ImageColumn, TextColumn};

class DesignTableColumns {
    public static function getOptions(): array
    {
       return [Split::make([Stack::make([])])];
    }

}
