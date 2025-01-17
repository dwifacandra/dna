<?php

namespace App\Core\Clusters\Resumes\Resources;

use App\Models\ResumeSkill;
use App\Core\{Clusters\Resumes, Traits\DefaultOptions};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};
use App\Core\Clusters\Resumes\Resources\SkillResource\{Pages, Forms, Tables};

class SkillResource extends Resource
{
    protected static ?string $cluster = Resumes::class;
    protected static ?string $model = ResumeSkill::class;
    protected static ?string $modelLabel = 'Skill';
    protected static ?string $navigationIcon = 'icon-core.outline.trophy';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.trophy';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\SkillFormSchemes::getOptions());
    }

    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->recordCheckboxPosition(RecordCheckboxPosition::AfterCells)
            ->columns(Tables\SkillTableColumns::getOptions())
            ->groups(Tables\SkillTableGroups::getOptions())
            ->defaultGroup('user.name')
            ->filters(Tables\SkillTableFilters::getOptions())
            ->actions(Tables\SkillTableActions::getOptions())
            ->bulkActions(Tables\SkillTableBulkActions::getOptions());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSkills::route('/'),
        ];
    }
}
