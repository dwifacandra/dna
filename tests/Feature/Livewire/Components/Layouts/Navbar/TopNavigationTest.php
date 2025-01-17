<?php

use App\Core\Components\Layouts\Navbar\TopNavigation;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(TopNavigation::class)
        ->assertStatus(200);
});
