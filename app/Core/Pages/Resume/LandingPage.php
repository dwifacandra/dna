<?php

namespace App\Core\Pages\Resume;

use Livewire\Component;
use App\Models\Category;
use App\Models\ResumeCompany;

class LandingPage extends Component
{
    public $skillGroups;
    public $companies;
    public function mount()
    {
        $this->skillGroups = Category::where('scope', 'resume_skill')->with('skills')->get();
        $this->companies = ResumeCompany::has('experiences')
            ->with('experiences')
            ->take(5)->get();
    }
    public function render()
    {
        return view('core.pages.resume.landing-page');
    }
}
