<?php

namespace App\Core\Clusters\Collections\Resources;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Clusters\Collections, Traits\DefaultOptions};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};
use App\Core\Clusters\Collections\Resources\AnimationResource\{Pages, Forms, Tables};

class AnimationResource extends Resource
{
    protected static ?string $cluster = Collections::class;
    protected static ?string $model = Collection::class;
    protected static ?string $modelLabel = 'Animation';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationIcon = 'core.outline.motion_photos_auto';
    protected static ?string $activeNavigationIcon = 'core.fill.motion_photos_auto';
    protected static ?string $navigationLabel = 'Animation';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\AnimationFormSchemes::getOptions());
    }
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs(['alignment' => 'center']);
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('scope', 'Animation');
            })
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->recordCheckboxPosition(RecordCheckboxPosition::AfterCells)
            ->columns(Tables\AnimationTableColumns::getOptions())
            ->filters(Tables\AnimationTableFilters::getOptions())
            ->filtersFormWidth('lg')->filtersFormColumns(3)
            ->actions(Tables\AnimationTableActions::getOptions())
            ->bulkActions(Tables\AnimationTableBulkActions::getOptions());
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAnimations::route('/'),
        ];
    }
}
