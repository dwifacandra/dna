<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Tables;

use Filament\Tables\Columns\{TextColumn, ImageColumn};
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class UserTableColumns
{
    public static function getOptions(): array
    {
        return [
            SpatieMediaLibraryImageColumn::make('avatar')
                ->collection('users_avatar')
                ->visibility('private')
                ->circular()
                ->size(50),
            TextColumn::make('name')
                ->alignLeft(),
            TextColumn::make('gender')
                ->badge(),
            TextColumn::make('birthday')
                ->date('d/m/Y'),
            TextColumn::make('phone')
                ->alignLeft(),
            TextColumn::make('email')
                ->alignLeft(),
            TextColumn::make('email_verified_at')
                ->dateTime('d/m/Y h:m:s'),
            TextColumn::make('created_at')
                ->dateTime('d/m/Y h:m:s')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('updated_at')
                ->dateTime('d/m/Y h:m:s')
                ->toggleable(isToggledHiddenByDefault: false),
        ];
    }
}
