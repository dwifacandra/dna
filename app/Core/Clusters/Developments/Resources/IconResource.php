<?php

namespace App\Core\Clusters\Developments\Resources;

use App\Models\Icon;
use Filament\{Resources\Resource, Pages\SubNavigationPosition, Tables\Table};
use App\Core\{Traits\DefaultOptions, Clusters\Developments};
use App\Core\Clusters\Developments\Resources\IconResource\{Pages, Tables, Widgets};

class IconResource extends Resource
{
    protected static ?string $cluster = Developments::class;
    protected static ?string $model = Icon::class;
    protected static ?string $modelLabel = 'Icon';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'icon-core.outline.fonticons';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.fonticons';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;


    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs([
            'sortable' => false,
            'alignment' => 'center'
        ]);
        return $table
            ->deferLoading()
            ->deferFilters()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(100)
            ->paginated([100, 250, 500, 1000, 2000, 'all'])
            ->columns(Tables\IconTableColumns::getOptions())
            ->contentGrid(['default' => 2, 'xl' => 12,])
            ->groups(Tables\IconTableGroups::getOptions())
            ->defaultGroup('folder')
            ->filters(Tables\IconTableFilters::getOptions())
        ;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageIcons::route('/'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\IconProvider::class,
        ];
    }
}
