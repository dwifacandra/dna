<?php

use App\Core\Components\Layouts\Navbar\BottomNavigation;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(BottomNavigation::class)
        ->assertStatus(200);
});
