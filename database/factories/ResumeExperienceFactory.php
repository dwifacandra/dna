<?php

namespace Database\Factories;

use App\Core\Enums\{JobType, LocationType};
use App\Models\{ResumeCompany, ResumeExperience};
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeExperienceFactory extends Factory
{
    protected $model = ResumeExperience::class;

    public function definition()
    {
        $faker = app(Faker::class);

        return [
            'company_id' => ResumeCompany::inRandomOrder()->first()->id,
            'user_id' => 1,
            'job_title' => $faker->jobTitle,
            'description' => (function () use ($faker) {
                $jobTitle = $faker->jobTitle;
                return "As a $jobTitle, I was responsible for " . strtolower($faker->paragraph);
            })(),
            'country' => 'Indonesia',
            'province' => $faker->randomElement(['Jawa Barat', 'DKI Jakarta', 'Jawa Tengah', 'Jawa Timur']),
            'regency' => $faker->city,
            'job_type' => $faker->randomElement(JobType::cases()),
            'location_type' => $faker->randomElement(LocationType::cases()),
            'start_date' => $faker->dateTimeBetween('-5 years', '-1 year')->format('Y-m-d'),
            'end_date' => ($endDate = $faker->optional(0.7)->dateTimeBetween('-1 year', 'now')) ? $endDate->format('Y-m-d') : null,
        ];
    }

    public function createSampleExperiences($count = 50)
    {
        for ($i = 0; $i < $count; $i++) {
            ResumeExperience::firstOrCreate($this->definition());
        }
    }
}
