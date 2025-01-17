<?php

namespace App\Core\Clusters\Peoples\Resources;

use App\Models\User;
use App\Core\{Clusters\Peoples, Traits\DefaultOptions};
use Filament\{Forms\Form, Tables\Table, Tables\Enums\RecordCheckboxPosition, Resources\Resource, Pages\SubNavigationPosition,};
use App\Core\Clusters\Peoples\Resources\UserResource\{Pages, Forms, Tables, RelationManagers};

class UserResource extends Resource
{
    protected static ?string $cluster = Peoples::class;
    protected static ?string $model = User::class;
    protected static ?string $modelLabel = 'User';
    protected static ?string $navigationIcon = 'icon-fa.solid.users';
    protected static ?int $navigationSort = 1;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Forms\UserFormSchemes::getOptions());
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
            ->columns(Tables\UserTableColumns::getOptions())
            ->filters(Tables\UserTableFilters::getOptions())
            ->actions(Tables\UserTableActions::getOptions())
            ->bulkActions(Tables\UserTableBulkActions::getOptions());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AccountsRelationManager::class,
        ];
    }
}
