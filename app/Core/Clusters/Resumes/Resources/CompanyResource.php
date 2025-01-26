<?php

namespace App\Core\Clusters\Resumes\Resources;

use App\Models\ResumeCompany;
use App\Core\{Clusters\Resumes, Traits\DefaultOptions};
use Filament\{Forms\Form, Tables\Table, Resources\Resource, Pages\SubNavigationPosition,};
use App\Core\Clusters\Resumes\Resources\CompanyResource\{Pages, Forms, Tables};

class CompanyResource extends Resource
{
    protected static ?string $model = ResumeCompany::class;
    protected static ?string $modelLabel = 'Company';
    protected static ?string $cluster = Resumes::class;
    protected static ?string $navigationIcon = 'icon-core.outline.corporate_fare';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\CompanyFormSchemes::getOptions());
    }
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->columns(Tables\CompanyTableColumns::getOptions())
            ->contentGrid(['default' => 4])
            ->filters(Tables\CompanyTableFilters::getOptions())
            ->actions(Tables\CompanyTableActions::getOptions())
            ->bulkActions(Tables\CompanyTableBulkActions::getOptions());
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCompanies::route('/'),
        ];
    }
}
