<?php

namespace App\Core\Clusters\Products\Resources;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Clusters\Products, Traits\DefaultOptions};
use App\Core\Clusters\Products\Resources\ProjectResource\{Pages, Forms, Tables, Widgets};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};

class ProjectResource extends Resource
{
    protected static ?string $cluster = Products::class;
    protected static ?string $model = Project::class;
    protected static ?string $modelLabel = 'Project';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'icon-core.outline.git';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.git';
    protected static ?string $navigationLabel = 'Projects';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProjects::route('/'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\TotalProjects::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('release', false)->count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'category.name'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\ProjectFormSchemes::getOptions());
    }

    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs(['alignment' => 'center']);
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('release', false);
            })
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->recordCheckboxPosition(RecordCheckboxPosition::AfterCells)
            ->columns(Tables\ProjectTableColumns::getOptions())
            ->filters(Tables\ProjectTableFilters::getOptions())
            ->filtersFormWidth('lg')->filtersFormColumns(3)
            ->actions(Tables\ProjectTableActions::getOptions())
            ->bulkActions(Tables\ProjectTableBulkActions::getOptions());
    }
}
