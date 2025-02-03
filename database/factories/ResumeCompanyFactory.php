<?php

namespace Database\Factories;

use App\Models\ResumeCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeCompanyFactory extends Factory
{
    protected $model = ResumeCompany::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'url' => $this->faker->url,
        ];
    }

    public function sampleCompanies()
    {
        return [
            [
                'name' => 'Ninja Van',
                'description' => 'Ninja Van is a tech-enabled logistics company providing delivery services across Southeast Asia.',
                'url' => 'https://www.ninjavan.co/',
            ],
            [
                'name' => 'Freelancer',
                'description' => 'Freelancer is a global crowdsourcing marketplace that connects employers with freelancers.',
                'url' => 'https://www.freelancer.com/',
            ],
        ];
    }

    public function createSampleCompanies()
    {
        foreach ($this->sampleCompanies() as $company) {
            ResumeCompany::firstOrCreate(['name' => $company['name']], $company);
        }
    }
}
