<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Core\Enums\{JobType, LocationType};
use App\Models\{ResumeCompany, ResumeExperience};
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeExperienceFactory extends Factory
{
    protected $model = ResumeExperience::class;
    public function definition()
    {
        $faker = app(Faker::class);
        $startDate = $faker->dateTimeBetween('-5 years', '-1 year')->format('Y-m-d');
        $endDate = (new \DateTime($startDate))->modify('+1 year')->format('Y-m-d');
        return [
            'company_id' => $faker->randomElement([1, 2]),
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
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
    public function createSampleExperiences($count = 10)
    {
        $experiences = [];
        for ($i = 0; $i < $count; $i++) {
            $experiences[] = $this->definition();
        }
        usort($experiences, function ($a, $b) {
            return strtotime($b['start_date']) - strtotime($a['start_date']);
        });
        $experiences[0]['end_date'] = null;
        foreach ($experiences as $experience) {
            ResumeExperience::firstOrCreate($experience);
        }
    }
}
