<?php

namespace App\Core\Clusters\Finances\Resources\SubcategoryResource\Forms;

use App\Core\{Enums\CashFlow, Helpers\CoreIcon, Components\Forms\PreviewIcon};
use Filament\{Forms\Get, Support\Enums\Alignment};
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\{TextInput, Hidden, MarkdownEditor, ToggleButtons, Select, Grid, Split, ColorPicker};

class SubcategoryFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Hidden::make('scope')
                ->default('transaction'),
            ToggleButtons::make('type')
                ->label('Cash Flow')
                ->default(CashFlow::Income)
                ->options(CashFlow::class)
                ->required()
                ->inline()
                ->grouped(),
            Split::make([
                Select::make('parent_id')
                    ->label('Category')
                    ->relationship(
                        name: 'parent',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn(Builder $query, $get) =>
                        $query
                            ->where('scope', 'transaction')
                            ->where('parent_id', null)
                            ->where('type', $get('type')),
                    )
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull()
                    ->native(false),
                TextInput::make('name')
                    ->required(),
            ]),
            Select::make('icon')
                ->label('Select Icon')
                ->native(false)
                ->searchable()
                ->reactive()
                ->default('core.outline.category')
                ->options(CoreIcon::getIcons())
                ->prefixIcon(function (Get $get): string {
                    return $get('icon') ?: 'core.outline.fonticons';
                }),
            MarkdownEditor::make('description'),
        ];
    }
}
