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
            [
                'label' => 'Sitemap',
                'url' => 'dev.sitemap',
                'icon' => 'core.outline.query_stats',
                'icon_position' => 'start',
                'position' => 'topbar',
                'icon_only' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Optimizer',
                'url' => 'dev.optimizer',
                'icon' => 'core.outline.cached',
                'icon_position' => 'start',
                'position' => 'topbar',
                'icon_only' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Storage Linked',
                'url' => 'dev.storage.link',
                'icon' => 'core.outline.cloud',
                'icon_position' => 'start',
                'position' => 'topbar',
                'icon_only' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Storage Unlinked',
                'url' => 'dev.storage.unlink',
                'icon' => 'core.outline.cloud_off',
                'icon_position' => 'start',
                'position' => 'topbar',
                'icon_only' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
