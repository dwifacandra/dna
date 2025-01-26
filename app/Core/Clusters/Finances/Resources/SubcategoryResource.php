<?php

namespace App\Core\Clusters\Finances\Resources;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Clusters\Finances, Traits\DefaultOptions, Traits\Categories};
use App\Core\Clusters\Finances\Resources\SubcategoryResource\{Pages, Forms, Tables};
use Filament\{Forms\Form, Tables\Table, Resources\Resource, Pages\SubNavigationPosition,};

class SubcategoryResource extends Resource
{
    protected static ?string $cluster = Finances::class;
    protected static ?string $model = Category::class;
    protected static ?string $modelLabel = 'Subcategory';
    protected static ?string $scope = 'transaction';
    protected static ?string $navigationIcon = 'icon-core.outline.category';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.category';
    protected static ?string $navigationLabel = 'Subcategories';
    protected static ?string $slug = 'categories/subcategories';
    protected static ?int $navigationSort = 2;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    public static function shouldRegisterNavigation(): bool
    {
        return request()->routeIs(static::getRouteBaseName() . '.*');
    }
    public static function getPages(): array
    {
        return ['index' => Pages\ManageSubcategories::route('/')];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('scope', static::$scope)
            ->whereNotNull('parent_id')
            ->count();
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('scope', static::$scope)
            ->whereNotNull('parent_id')
            ->orderBy('parent_id', 'asc');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\SubcategoryFormSchemes::getOptions())
            ->columns(1);
    }
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->columns(Categories::getTableColumns())
            ->contentGrid(['default' => 2, 'xl' => 4,])
            ->groups(Tables\SubcategoryTableGroups::getOptions())
            ->defaultGroup('parent.name')
            ->actions(Categories::getTableActions())
            ->bulkActions(Categories::getTableBulkActions());
    }
}
