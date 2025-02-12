<?php

namespace App\Core\Clusters\Finances\Resources\CategoryResource\Forms;

use App\Core\{Enums\CashFlow, Helpers\CoreIcon, Components\Forms\PreviewIcon};
use Filament\{Forms\Get, Support\Enums\Alignment};
use App\Core\Clusters\Finances\Resources\SubcategoryResource\Forms\RelationSubcategoryFormSchemes;
use Filament\Forms\Components\{TextInput, Hidden, RichEditor, ToggleButtons,  Repeater, Split, Grid, Select, ColorPicker};

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
            RichEditor::make('description'),
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
