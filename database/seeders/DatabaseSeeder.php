<?php

namespace Database\Seeders;

use App\Models\{User};
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'super_admin']);
        $creatorRole = Role::create(['name' => 'Creator']);
        Artisan::call('shield:generate', [
            '--all' => true,
            '--panel' => 'core'
        ]);
        $creatorRole->givePermissionTo(Permission::all());
        $user = User::firstOrCreate(
            [
                'email' => 'aditya@dna.test',
                'name' => 'Aditya Dwifacandra Nugraha',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );
        $user->assignRole('super_admin');
        if (config('app.env') === 'local') {
            User::factory(10)->create();
            $this->call([
                CategorySeeder::class,
                ResumeSeeder::class,
                ProjectsSeeder::class,
            ]);
        }
        $this->call([]);
    }
}
