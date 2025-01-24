<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            [
                'email' => 'aditya@dna.test',
                'name' => 'Aditya Dwifacandra Nugraha',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        User::factory(10)->create();

        $this->call([
            NavigationSeeder::class,
            CategorySeeder::class,
            ResumeSeeder::class,
            ProjectsSeeder::class,
        ]);
    }
}
