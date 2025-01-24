<?php

namespace App\Core\Clusters\Settings\Resources;

use Filament\Forms\Form;
use App\Models\Navigation;
use Filament\Tables\Table;
use App\Core\Clusters\Settings;
use Filament\Resources\Resource;
use App\Core\Traits\DefaultOptions;
use Filament\Pages\SubNavigationPosition;
use Filament\Tables\Enums\RecordCheckboxPosition;
use App\Core\Clusters\Settings\Resources\NavigationResource\Pages;
use App\Core\Clusters\Settings\Resources\NavigationResource\Forms\NavigationFormSchemes;
use App\Core\Clusters\Settings\Resources\NavigationResource\Tables\NavigationTableActions;
use App\Core\Clusters\Settings\Resources\NavigationResource\Tables\NavigationTableColumns;
use App\Core\Clusters\Settings\Resources\NavigationResource\Tables\NavigationTableFilters;
use App\Core\Clusters\Settings\Resources\NavigationResource\Tables\NavigationTableBulkActions;

class NavigationResource extends Resource
{

    protected static ?string $cluster = Settings::class;
    protected static ?string $model = Navigation::class;
    protected static ?string $modelLabel = 'Navigation';
    protected static ?string $recordTitleAttribute = 'label';
    protected static ?string $navigationIcon = 'icon-core.outline.grid_view';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.grid_view';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form->schema(NavigationFormSchemes::getOptions());
    }

    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs(['alignment' => 'center']);
        return $table
            ->deferLoading()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(15)
            ->paginated([10, 15, 25, 50, 100, 'all'])
            ->recordCheckboxPosition(RecordCheckboxPosition::AfterCells)
            ->columns(NavigationTableColumns::getOptions())
            ->filters(NavigationTableFilters::getOptions())
            ->actions(NavigationTableActions::getOptions())
            ->bulkActions(NavigationTableBulkActions::getOptions());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageNavigations::route('/'),
        ];
    }
}
