<?php

namespace App\Core\Clusters\Finances\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Transaction;
use App\Core\Clusters\Finances;
use Filament\Resources\Resource;
use App\Core\Traits\DefaultOptions;
use Filament\Pages\SubNavigationPosition;
use Filament\Tables\Enums\RecordCheckboxPosition;
use App\Core\Clusters\Finances\Resources\TransactionResource\{Pages, Forms, Tables};

class TransactionResource extends Resource
{
    protected static ?string $cluster = Finances::class;
    protected static ?string $model = Transaction::class;
    protected static ?string $modelLabel = 'Transaction';
    protected static ?string $navigationIcon = 'icon-core.outline.currency_exchange';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form->schema(Forms\TransactionFormSchemes::getOptions());
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
            ->columns(Tables\TransactionTableColumns::getOptions())
            ->groups(Tables\TransactionTableGroups::getOptions())
            ->defaultGroup('cash_flow')
            ->filters(Tables\TransactionTableFilters::getOptions())
            ->actions(Tables\TransactionTableActions::getOptions())
            ->bulkActions(Tables\TransactionTableBulkActions::getOptions());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTransactions::route('/'),
        ];
    }
}
