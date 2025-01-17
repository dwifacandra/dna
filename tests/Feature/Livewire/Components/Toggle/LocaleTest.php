<?php

use App\Core\Components\Toggle\Locale;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Locale::class)
        ->assertStatus(200);
});
