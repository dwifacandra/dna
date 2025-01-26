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
            Grid::make([
                'default' => 2,
            ])->schema([
                Select::make('icon')
                    ->label('Select Icon')
                    ->native(false)
                    ->searchable()
                    ->reactive()
                    ->required()
                    ->options(CoreIcon::getIcons())
                    ->afterStateUpdated(function ($set, $state, $get) {
                        $set('icon_preview', $state . ':' . $get('icon_color'));
                    }),
                ColorPicker::make('icon_color')
                    ->reactive()
                    ->default('#171717')
                    ->visible(fn(Get $get): bool => filled($get('icon')))
                    ->afterStateUpdated(function ($set, $state, $get) {
                        $set('icon_preview', $get('icon') . ':' . $state);
                    }),
                PreviewIcon::make('icon_preview')
                    ->label('Preview Icon')
                    ->columnSpanFull()
                    ->visible(fn(Get $get): bool => filled($get('icon'))),
            ]),
            MarkdownEditor::make('description'),
        ];
    }
}
