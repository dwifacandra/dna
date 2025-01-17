<?php

namespace App\Core\Clusters\Resumes\Resources;

use App\Models\ResumeSkillCategory;
use App\Core\{Clusters\Resumes, Traits\DefaultOptions};
use Filament\{
    Forms\Form,
    Tables\Table,
    Tables\Enums\RecordCheckboxPosition,
    Resources\Resource,
    Pages\SubNavigationPosition,
};
use App\Core\Clusters\Resumes\Resources\SkillCategoryResource\{Pages, Forms, Tables};

class SkillCategoryResource extends Resource
{
    protected static ?string $cluster = Resumes::class;
    protected static ?string $model = ResumeSkillCategory::class;
    protected static ?string $modelLabel = 'Skill Category';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Categories';
    protected static ?string $slug = 'skills/categories';
    protected static bool $shouldRegisterNavigation = false;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;


    public static function getPages(): array
    {
        return ['index' => Pages\ManageSkillCategories::route('/')];
    }

    public static function form(Form $form): Form
    {
        return $form->schema(Forms\SkillCategoryFormSchemes::getOptions())->columns(1);
    }

    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs(['alignment' => 'left']);
        return $table
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->recordCheckboxPosition(RecordCheckboxPosition::AfterCells)
            ->columns(Tables\SkillCategoryTableColumns::getOptions())
            ->contentGrid(['default' => 2, 'xl' => 4,])
            ->actions(Tables\SkillCategoryTableActions::getOptions())
            ->bulkActions(Tables\SkillCategoryTableBulkActions::getOptions());
    }
}
