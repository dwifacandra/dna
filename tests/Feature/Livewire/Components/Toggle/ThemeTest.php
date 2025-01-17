<?php

use App\Core\Components\Toggle\Theme;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Theme::class)
        ->assertStatus(200);
});
