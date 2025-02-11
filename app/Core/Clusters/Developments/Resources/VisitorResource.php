<?php

namespace App\Core\Clusters\Developments\Resources;

use App\Models\Visitor;
use Filament\{Resources\Resource, Pages\SubNavigationPosition, Tables\Table};
use App\Core\{Traits\DefaultOptions, Clusters\Developments};
use App\Core\Clusters\Developments\Resources\VisitorResource\{Pages, Tables, Widgets};

class VisitorResource extends Resource
{
    protected static ?string $cluster = Developments::class;
    protected static ?string $model = Visitor::class;
    protected static ?string $modelLabel = 'Visitor';
    protected static ?string $recordTitleAttribute = 'ip_address';
    protected static ?string $navigationIcon = 'icon-core.outline.travel_explore';
    protected static ?int $navigationSort = 1;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs(['alignment' => 'center']);
        return $table
            ->deferLoading()
            ->deferFilters()
            ->extremePaginationLinks()
            ->defaultPaginationPageOption(100)
            ->paginated([100, 250, 500, 1000, 2000, 'all'])
            ->columns(Tables\VisitorTableColumns::getOptions())
            ->defaultGroup('locale');
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageVisitors::route('/'),
        ];
    }
}
