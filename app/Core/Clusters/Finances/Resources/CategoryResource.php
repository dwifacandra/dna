<?php

namespace App\Core\Clusters\Finances\Resources;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Clusters\Finances, Traits\DefaultOptions, Traits\Categories};
use App\Core\Clusters\Finances\Resources\CategoryResource\{Pages, Forms, Tables, RelationManagers};
use Filament\{Forms\Form, Tables\Table, Resources\Resource, Pages\SubNavigationPosition,};

class CategoryResource extends Resource
{
    protected static ?string $cluster = Finances::class;
    protected static ?string $model = Category::class;
    protected static ?string $modelLabel = 'Category';
    protected static ?string $scope = 'transaction';
    protected static ?string $navigationIcon = 'icon-core.outline.category';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.category';
    protected static ?string $navigationLabel = 'Categories';
    protected static ?string $slug = 'categories';
    protected static ?int $navigationSort = 2;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    public static function getPages(): array
    {
        return ['index' => Pages\ManageCategories::route('/')];
    }
    public static function getRelations(): array
    {
        return [
            RelationManagers\ChildRelationManager::class,
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('scope', static::$scope)
            ->whereNull('parent_id')
            ->count();
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('scope', static::$scope)
            ->whereNull('parent_id');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\CategoryFormSchemes::getOptions())
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
            ->groups(Tables\CategoryTableGroups::getOptions())
            ->defaultGroup('type')
            ->actions(Categories::getTableActions())
            ->bulkActions(Categories::getTableBulkActions());
    }
}
