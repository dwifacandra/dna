<?php

namespace App\Core\Components\Layouts\Navbar;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class TopNavigation extends Component
{
    public function render()
    {
        return view('core.components.layouts.navbar.top-navigation');
    }
}
