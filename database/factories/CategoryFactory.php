<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => ucwords($this->faker->unique()->words(2, true)),
            'description' => $this->faker->sentence,
            'scope' => $this->faker->randomElement(['project', 'resume_skill']),
        ];
    }

    public function createSampleCategories()
    {
        $sampleCategories = [
            [
                'name' => 'Web Development',
                'description' => 'All about building websites and web applications.',
                'scope' => 'project',
            ],
            [
                'name' => 'Graphic Design',
                'description' => 'Creating visual content to communicate messages.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'Data Science',
                'description' => 'Using scientific methods to extract insights from data.',
                'scope' => 'project',
            ],
            [
                'name' => 'Digital Marketing',
                'description' => 'Promoting products or brands via digital channels.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Creating software applications for mobile devices.',
                'scope' => 'project',
            ],
            [
                'name' => 'SEO Optimization',
                'description' => 'Improving the visibility of a website in search engines.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'Machine Learning',
                'description' => 'A subset of AI that focuses on building systems that learn from data.',
                'scope' => 'project',
            ],
            [
                'name' => 'Content Writing',
                'description' => 'Creating written content for various platforms.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'Designing user interfaces and experiences for applications.',
                'scope' => 'project',
            ],
            [
                'name' => 'Cloud Computing',
                'description' => 'Using remote servers hosted on the internet to store, manage, and process data.',
                'scope' => 'resume_skill',
            ],
        ];

        foreach ($sampleCategories as $category) {
            Category::create($category);
        }
    }
}
