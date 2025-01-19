<?php

namespace App\Core\Clusters\Projects\Resources;

use App\Models\Project;
use App\Core\{Clusters\Projects, Traits\DefaultOptions};
use App\Core\Clusters\Projects\Resources\ProjectResource\{Pages, Forms, Tables, Widgets};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};

class ProjectResource extends Resource
{
    protected static ?string $cluster = Projects::class;
    protected static ?string $model = Project::class;
    protected static ?string $modelLabel = 'Project';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'icon-core.outline.git';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.git';
    protected static ?string $navigationLabel = 'All Project';
    protected static ?string $slug = 'all';
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
            Widgets\MonthlyBudgetChart::class,
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'category.name',  'customer.name'];
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
