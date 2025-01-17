<?php

namespace App\Core\Clusters\Resumes\Resources;

use App\Models\ResumeExperience;
use App\Core\{Clusters\Resumes, Traits\DefaultOptions};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};
use App\Core\Clusters\Resumes\Resources\ExperienceResource\{Pages, Forms, Tables};

class ExperienceResource extends Resource
{
    protected static ?string $model = ResumeExperience::class;
    protected static ?string $cluster = Resumes::class;
    protected static ?string $modelLabel = 'Experience';
    protected static ?string $navigationIcon = 'icon-core.outline.work_history';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.work_history';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\ExperienceFormSchemes::getOptions());
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
            ->columns(Tables\ExperienceTableColumns::getOptions())
            ->groups(Tables\ExperienceTableGroups::getOptions())
            ->defaultGroup('company.name')
            ->actions(Tables\ExperienceTableActions::getOptions())
            ->bulkActions(Tables\ExperienceTableBulkActions::getOptions());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageExperiences::route('/'),
        ];
    }
}
