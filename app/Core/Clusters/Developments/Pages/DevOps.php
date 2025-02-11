<?php

namespace App\Core\Clusters\Developments\Pages;

use Filament\Actions\Action;
use App\Core\Clusters\Developments;
use Filament\Support\Enums\ActionSize;
use Filament\Actions\Contracts\HasActions;
use App\Http\Controllers\Dev\AutomationController;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\{Pages\Page, Pages\SubNavigationPosition};

class DevOps extends Page implements HasActions
{
    use InteractsWithActions;
    protected $automation;
    protected static ?string $cluster = Developments::class;
    protected static string $view = 'core.clusters.developments.pages.dev-ops';
    protected static ?string $navigationIcon = 'icon-core.outline.developer_board';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.developer_board';
    protected static ?int $navigationSort = 3;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    public function __construct()
    {
        $this->automation = new AutomationController();
    }
    public function optimize(): Action
    {
        return Action::make('optimize')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('dna:optimize'));
    }
    public function optimizeClear(): Action
    {
        return Action::make('optimizeClear')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('dna:optimize --clear'));
    }
    public function runMigrate(): Action
    {
        return Action::make('runMigrate')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('migrate'));
    }
    public function storageLink(): Action
    {
        return Action::make('storageLink')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('storage:link'));
    }
    public function storageUnlink(): Action
    {
        return Action::make('storageUnlink')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('storage:unlink'));
    }
    public function permissionSync(): Action
    {
        return Action::make('permissionSync')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('permissions:sync --yes-to-all'));
    }
}
