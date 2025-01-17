<?php

use App\Core\Pages\LandingPage;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(LandingPage::class)
        ->assertStatus(200);
});
