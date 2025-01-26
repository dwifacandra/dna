<?php

namespace App\Core\Clusters\Finances\Resources\CategoryResource\Forms;

use App\Core\{Enums\CashFlow, Helpers\CoreIcon, Components\Forms\PreviewIcon};
use Filament\{Forms\Get, Support\Enums\Alignment};
use App\Core\Clusters\Finances\Resources\SubcategoryResource\Forms\RelationSubcategoryFormSchemes;
use Filament\Forms\Components\{TextInput, Hidden, MarkdownEditor, ToggleButtons,  Repeater, Split, Grid, Select, ColorPicker};

class CategoryFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Hidden::make('scope')
                ->default('transaction'),
            Split::make([
                TextInput::make('name')
                    ->required(),
                ToggleButtons::make('type')
                    ->label('Cash Flow')
                    ->default(CashFlow::Income)
                    ->options(CashFlow::class)
                    ->required()
                    ->inline()
                    ->grouped(),
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
            Repeater::make('subcategories')
                ->label('Subcategories')
                ->itemLabel(fn(array $state): ?string => $state['name'] ?? null)
                ->addActionAlignment(Alignment::Start)
                ->createItemButtonLabel('New Subcategories')
                ->collapsible()
                ->collapsed()
                ->cloneable()
                ->relationship('child')
                ->defaultItems(0)
                ->schema(RelationSubcategoryFormSchemes::getOptions())
                ->grid(2),
        ];
    }
}
