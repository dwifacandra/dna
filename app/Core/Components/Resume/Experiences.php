<?php

namespace App\Core\Components\Resume;

use Livewire\Component;
use App\Models\ResumeCompany;

class Experiences extends Component
{
    public $companies;

    public function mount()
    {
        $this->companies = ResumeCompany::has('experiences')
            ->with('experiences')
            ->take(5)->get();
    }

    public function render()
    {
        return view('core.components.resume.experiences');
    }
}
