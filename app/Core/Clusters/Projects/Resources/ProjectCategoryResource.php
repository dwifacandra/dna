<?php

namespace App\Core\Clusters\Projects\Resources;

use App\Models\ProjectCategory;
use App\Core\{Clusters\Projects, Traits\DefaultOptions};
use Filament\{Forms\Form, Tables\Table, Resources\Resource, Pages\SubNavigationPosition,};
use App\Core\Clusters\Projects\Resources\ProjectCategoryResource\{Pages, Tables, Forms};

class ProjectCategoryResource extends Resource
{
    protected static ?string $cluster = Projects::class;
    protected static ?string $model = ProjectCategory::class;
    protected static ?string $modelLabel = 'Category';
    protected static ?string $navigationIcon = 'icon-core.outline.page_info';
    protected static ?string $navigationLabel = 'Categories';
    protected static ?string $slug = 'categories';
    protected static ?int $navigationSort = 2;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\ProjectCategoryFormSchemes::getOptions());
    }

    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->columns(Tables\ProjectCategoryTableColumns::getOptions())
            ->contentGrid(['default' => 2, 'xl' => 4,])
            ->actions(Tables\ProjectCategoryTableActions::getOptions())
            ->bulkActions(Tables\ProjectCategoryTableBulkActions::getOptions());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProjectCategories::route('/'),
        ];
    }
}
