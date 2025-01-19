<?php

namespace App\Core\Components\Layouts\Navbar;

use Livewire\Component;
use App\Core\Traits\Navigations;

class PanelNavigation extends Component
{
    public $navigations;

    public function mount()
    {
        $this->navigations = Navigations::getTopNavigations();
    }

    public function render()
    {
        return view('core.components.layouts.navbar.panel-navigation');
    }
}
