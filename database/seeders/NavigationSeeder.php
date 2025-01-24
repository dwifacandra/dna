<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavigationSeeder extends Seeder
{
    public function run()
    {
        DB::table('navigations')->insert([
            [
                'label' => 'Landing',
                'url' => 'landing-page',
                'icon' => null,
                'icon_position' => 'start',
                'position' => 'topbar',
                'icon_only' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
