<?php

namespace App\Core\Traits;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns\Column;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Actions\{EditAction, DeleteAction, DeleteBulkAction, ActionGroup, BulkActionGroup};

trait DefaultOptions
{
    public static function getColumnConfigs(array $option = []): void
    {
        $option = array_merge([
            'searchable' => true,
            'sortable' => true,
            'alignment' => Alignment::Left,
        ], $option);
        Column::configureUsing(function (Column $column) use ($option): void {
            $column
                ->searchable($option['searchable'])
                ->sortable($option['sortable'])
                ->alignment($option['alignment']);
        });
    }
    public static function getDefaultHeaderActions($slideOver = true, $moreActions = []): array
    {
        return [
            CreateAction::make()
                ->icon('icon-fa.solid.plus')
                ->color('success')
                ->slideOver($slideOver)
                ->stickyModalHeader()
                ->stickyModalFooter()
                ->createAnother(false)
                ->modalAutofocus(false),
            ...$moreActions,
        ];
    }
    public static function getDefaultActions($slideOver = true): array
    {
        return [
            EditAction::make()
                ->slideOver($slideOver)
                ->stickyModalHeader()
                ->stickyModalFooter()
                ->modalAutofocus(false),
            DeleteAction::make(),
        ];
    }
    public static function getActionGroups($slideOver = true, $moreActions = []): array
    {
        return [
            ActionGroup::make([
                EditAction::make()
                    ->slideOver($slideOver)
                    ->stickyModalHeader()
                    ->stickyModalFooter()
                    ->modalAutofocus(false),
                ...$moreActions,
                DeleteAction::make(),
            ])->icon('heroicon-o-list-bullet')
        ];
    }
    public static function getBulkActionGroups(): array
    {
        return [
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ];
    }
}
