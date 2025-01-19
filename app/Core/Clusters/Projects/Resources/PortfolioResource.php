<?php

namespace App\Core\Clusters\Projects\Resources;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Clusters\Projects, Traits\DefaultOptions};
use App\Core\Clusters\Projects\Resources\ProjectResource\{Forms, Tables as ProjectTables};
use App\Core\Clusters\Projects\Resources\PortfolioResource\{Pages, Tables, Widgets};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};

class PortfolioResource extends Resource
{
    protected static ?string $cluster = Projects::class;
    protected static ?string $model = Project::class;
    protected static ?string $modelLabel = 'Portfolio';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'icon-core.outline.library_books';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.library_books';
    protected static ?string $navigationLabel = 'Portfolio';
    protected static ?string $slug = 'portfolio';
    protected static ?int $navigationSort = 1;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePortfolio::route('/'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\TotalPortfolioChart::class,
            Widgets\BudgetPortfolioChart::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('publish_to_portfolio', true)->count();
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
        DefaultOptions::getColumnConfigs();
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('publish_to_portfolio', true);
            })
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->recordCheckboxPosition(RecordCheckboxPosition::AfterCells)
            ->columns(Tables\PortfolioTableColumns::getOptions())
            ->contentGrid(['default' => 5])
            ->filtersFormWidth('lg')->filtersFormColumns(3)
            ->actions(ProjectTables\ProjectTableActions::getOptions())
            ->bulkActions(ProjectTables\ProjectTableBulkActions::getOptions());
    }
}
