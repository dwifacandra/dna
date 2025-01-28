<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Core\Enums\ProjectStatus;
use App\Core\Enums\ProjectPriority;
use App\Models\{Customer, Project};

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        foreach (range(1, 50) as $index) {
            Customer::firstOrCreate([
                'name' => $faker->name,
                'phone' => $this->generatePhoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $categories = Category::where('scope', 'project')->get();
        foreach (range(1, 50) as $index) {
            $release = $faker->boolean;
            $status = $release ? ProjectStatus::Done : $this->getRandomProjectStatus();
            $price = $release ? $faker->numberBetween(100000, 10000000) : 0;
            $featured = $release ? $faker->boolean : 0;
            Project::firstOrCreate([
                'name' => $faker->sentence(2),
                'description' => $faker->paragraph,
                'url' => $faker->url,
                'repository' => $faker->url,
                'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+1 year'),
                'status' => $status,
                'priority' => $this->getRandomProjectPriority(),
                'user_id' => 1,
                'category_id' => $categories->random()->id,
                'price' => $price,
                'release' => $release,
                'featured' => $featured,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    private function getRandomProjectStatus(): string
    {
        $statuses = ProjectStatus::cases();
        return $statuses[array_rand($statuses)]->value;
    }
    private function getRandomProjectPriority(): string
    {
        $statuses = ProjectPriority::cases();
        return $statuses[array_rand($statuses)]->value;
    }
    private function generatePhoneNumber(): string
    {
        $countryCode = '+62';
        $number = fake()->numerify('###########');
        return $countryCode . $number;
    }
}
