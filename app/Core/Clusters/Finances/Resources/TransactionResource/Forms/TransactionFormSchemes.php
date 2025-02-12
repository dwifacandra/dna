<?php

namespace App\Core\Clusters\Finances\Resources\TransactionResource\Forms;

use Filament\Support\RawJs;
use App\Core\Enums\CashFlow;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Core\Clusters\Finances\Resources\CategoryResource\Forms\CategoryFormSchemes;
use Filament\Forms\Components\{TextInput, DatePicker, Select, ToggleButtons, RichEditor};

class TransactionFormSchemes
{
    public static function getOptions(): array
    {
        return [
            DatePicker::make('date')
                ->required()
                ->default(today()),
            ToggleButtons::make('cash_flow')
                ->label('Cash Flow')
                ->default(CashFlow::Income)
                ->options(CashFlow::class)
                ->required()
                ->inline()
                ->grouped(),
            TextInput::make('name')
                ->required(),
            TextInput::make('amount')
                ->mask(RawJs::make('$money($input, \',\')'))
                ->stripCharacters('.')
                ->prefix('Rp')
                ->numeric()
                ->required()
                ->minLength(1)
                ->maxLength(10),
            Select::make('category_id')
                ->relationship(
                    name: 'category',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn(Builder $query, $get) =>
                    $query
                        ->where('scope', 'transaction')
                        ->whereNull('parent_id')
                        ->where('type', $get('cash_flow')),
                )
                ->manageOptionForm(CategoryFormSchemes::getOptions())
                ->searchable()
                ->preload()
                ->native(false),
            Select::make('subcategory_id')
                ->relationship(
                    name: 'subcategory',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn(Builder $query, $get) =>
                    $query
                        ->where('scope', 'transaction')
                        ->whereNotNull('parent_id')
                        ->where('type', $get('cash_flow'))
                        ->where('parent_id', $get('category_id')),
                )
                ->manageOptionForm(CategoryFormSchemes::getOptions())
                ->searchable()
                ->preload()
                ->native(false),
            Select::make('payee_id')
                ->relationship('payee', 'name')
                ->required()
                ->searchable()
                ->preload()
                ->native(false),
            SpatieMediaLibraryFileUpload::make('attachment')
                ->columnSpanFull()
                ->collection('transactions')
                ->visibility('private')
                ->image()
                ->imageEditor()
                ->downloadable()
                ->multiple()
                ->nullable(),
            RichEditor::make('description')->columnSpanFull(),
        ];
    }
}
