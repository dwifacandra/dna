<?php

namespace App\Core\Clusters\Peoples\Resources;

use App\Models\Customer;
use App\Core\{Clusters\Peoples, Traits\DefaultOptions};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};
use App\Core\Clusters\Peoples\Resources\CustomerResource\{Pages, Forms, Tables};

class CustomerResource extends Resource
{
    protected static ?string $cluster = Peoples::class;
    protected static ?string $model = Customer::class;
    protected static ?string $modelLabel = 'Customer';
    protected static ?string $navigationIcon = 'icon-fa.solid.people-line';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\CustomerFormSchemes::getOptions());
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
            ->columns(Tables\CustomerTableColumns::getOptions())
            ->filters(Tables\CustomerTableFilters::getOptions())
            ->actions(Tables\CustomerTableActions::getOptions())
            ->bulkActions(Tables\CustomerTableBulkActions::getOptions());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCustomers::route('/'),
        ];
    }
}
