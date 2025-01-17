<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\RelationManagers;

use Filament\{Forms\Form, Tables\Table, Resources\RelationManagers\RelationManager};
use App\Core\Clusters\Peoples\Resources\UserResource\{Forms, Tables};

class AccountsRelationManager extends RelationManager
{
    protected static string $relationship = 'accounts';
    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form
            ->schema(Forms\AccountFormSchemes::getOptions());
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns(Tables\AccountsTableColumns::getOptions());
    }
}
