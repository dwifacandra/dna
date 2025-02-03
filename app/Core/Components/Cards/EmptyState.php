<?php

namespace App\Core\Components\Cards;

use Livewire\Component;

class EmptyState extends Component
{
    public $message;
    public $icon;
    public function render()
    {
        return view('core.components.cards.empty-state');
    }
}
