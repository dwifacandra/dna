<?php

namespace App\Core\Components;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $items = [];
    public function mount($items = null)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('core.components.breadcrumb');
    }
}
