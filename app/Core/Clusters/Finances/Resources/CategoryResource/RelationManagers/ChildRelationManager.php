<?php

namespace App\Core\Clusters\Finances\Resources\CategoryResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Core\Traits\Categories;
use App\Core\Traits\DefaultOptions;
use Filament\Resources\RelationManagers\RelationManager;
use App\Core\Clusters\Finances\Resources\SubcategoryResource\Tables\SubcategoryTableGroups;
use App\Core\Clusters\Finances\Resources\SubcategoryResource\Forms\RelationSubcategoryFormSchemes;

class ChildRelationManager extends RelationManager
{
    protected static string $relationship = 'child';

    public function form(Form $form): Form
    {
        return $form
            ->schema(RelationSubcategoryFormSchemes::getOptions());
    }

    public function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->recordTitleAttribute('parent_id')
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->columns(Categories::getTableColumns())
            ->contentGrid(['default' => 2, 'xl' => 4,])
            ->groups(SubcategoryTableGroups::getOptions())
            ->defaultGroup('parent.name')
            ->actions(Categories::getTableActions())
            ->bulkActions(Categories::getTableBulkActions());
    }
}
