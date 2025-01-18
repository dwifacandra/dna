<?php

namespace Database\Seeders;

use App\Models\{ResumeSkill, ResumeCompany, ResumeExperience};
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    public function run(): void
    {
        ResumeCompany::factory()->createSampleCompanies();
        ResumeExperience::factory()->createSampleExperiences(50);
        ResumeSkill::factory()->createSampleSkills(20);
    }
}
