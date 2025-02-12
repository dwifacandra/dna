<?php

namespace App\Core\Clusters\Collections\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Collection;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Core\Clusters\Collections;
use Filament\Pages\SubNavigationPosition;
use App\Core\Clusters\Collections\Resources\DesignResource\{Pages, Forms,};

class DesignResource extends Resource
{
    protected static ?string $cluster = Collections::class;
    protected static ?string $model = Collection::class;
    protected static ?string $modelLabel = 'Design';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationIcon = 'core.outline.photo_library';
    protected static ?string $activeNavigationIcon = 'core.fill.photo_library';
    protected static ?string $navigationLabel = 'Design';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\DesignFormSchemes::getOptions());
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDesigns::route('/'),
        ];
    }
}
