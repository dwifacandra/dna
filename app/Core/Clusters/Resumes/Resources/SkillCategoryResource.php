<?php

namespace App\Core\Clusters\Resumes\Resources;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Clusters\Resumes, Traits\DefaultOptions, Traits\Categories};
use App\Core\Clusters\Resumes\Resources\SkillCategoryResource\{Pages};
use Filament\{Forms\Form, Tables\Table, Resources\Resource, Pages\SubNavigationPosition,};

class SkillCategoryResource extends Resource
{
    protected static ?string $cluster = Resumes::class;
    protected static ?string $model = Category::class;
    protected static ?string $modelLabel = 'Category';
    protected static ?string $scope = 'resume_skill';
    protected static ?string $navigationIcon = 'icon-core.outline.category';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.category';
    protected static ?string $navigationLabel = 'Skill Categories';
    protected static ?string $slug = 'skills/categories';
    protected static ?int $navigationSort = 2;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function shouldRegisterNavigation(): bool
    {
        return request()->routeIs(static::getRouteBaseName() . '.*');
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ManageSkillCategories::route('/')];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('scope', static::$scope)->count();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('scope', static::$scope);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Categories::getFormSchemes(static::$scope))
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
            ->actions(Categories::getTableActions())
            ->bulkActions(Categories::getTableBulkActions());
    }
}
