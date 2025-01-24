<?php

namespace App\Core\Clusters\Products\Resources;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Clusters\Products, Traits\DefaultOptions};
use App\Core\Clusters\Products\Resources\ProjectResource\{Forms};
use App\Core\Clusters\Products\Resources\PortfolioResource\{Pages, Tables, Widgets};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};

class PortfolioResource extends Resource
{
    protected static ?string $cluster = Products::class;
    protected static ?string $model = Project::class;
    protected static ?string $modelLabel = 'Portfolio';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'icon-core.outline.library_books';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.library_books';
    protected static ?string $navigationLabel = 'Portfolios';
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
        return static::getModel()::where('release', true)->count();
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
                return $query->where('release', true);
            })
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->recordCheckboxPosition(RecordCheckboxPosition::AfterCells)
            ->columns(Tables\PortfolioTableColumns::getOptions())
            ->groups(Tables\PortfolioTableGroups::getOptions())
            ->defaultGroup('category.name')
            ->filters(Tables\PortfolioTableFilters::getOptions())
            ->filtersFormWidth('lg')->filtersFormColumns(3)
            ->actions(Tables\PortfolioTableActions::getOptions())
            ->bulkActions(Tables\PortfolioTableBulkActions::getOptions());
    }
}
