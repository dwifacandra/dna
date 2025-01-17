<?php

namespace Database\Seeders;

use App\Core\Enums\ProjectPriority;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Core\Enums\ProjectStatus;
use App\Models\{Customer, Project, ProjectCategory};

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 50) as $index) {
            Customer::firstOrCreate([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $categories = [
            ['name' => 'Development'],
            ['name' => 'Design'],
            ['name' => 'Marketing'],
            ['name' => 'Research'],
            ['name' => 'Management'],
        ];

        foreach ($categories as $category) {
            ProjectCategory::firstOrCreate($category);
        }

        $customers = Customer::all();
        $categoryIds = ProjectCategory::pluck('id');
        $thumbnailPath = public_path('storage/projects/thumbnail');
        $thumbnails = array_diff(scandir($thumbnailPath), ['..', '.']);

        foreach (range(1, 50) as $index) {
            $randomThumbnail = $thumbnails[array_rand($thumbnails)];

            Project::firstOrCreate([
                'name' => $faker->sentence(2),
                'description' => $faker->paragraph,
                'url' => $faker->url,
                'repository' => $faker->url,
                'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+1 year'),
                'status' => $this->getRandomProjectStatus(),
                'priority' => $this->getRandomProjectPriority(),
                'user_id' => 1,
                'customer_id' => $customers->random()->id,
                'category_id' => $categoryIds->random(),
                'budget' => $faker->numberBetween(100000, 10000000),
                'publish_to_portfolio' => $faker->boolean,
                'thumbnail' => asset("storage/projects/thumbnail/{$randomThumbnail}"),
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
}
