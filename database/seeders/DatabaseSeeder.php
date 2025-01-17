<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate([
            'email' => 'admin@dna.test',
        ], [
            'name' => 'Administrator',
        ]);

        $this->call([
            ResumeSeeder::class,
            ProjectsSeeder::class,
        ]);
    }
}
