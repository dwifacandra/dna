<?php

namespace App\Core\Components\Resume;

use Livewire\Component;
use App\Models\ResumeSkill;

class Skills extends Component
{
    public $skills;
    public function mount()
    {
        $this->skills = ResumeSkill::orderBy('rate', 'desc')->get();
    }
    public function render()
    {
        return view('core.components.resume.skills');
    }
}
