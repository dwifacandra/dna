<?php

namespace App\Core\Components\Jumbotron;

use App\Models\ResumeSkill;
use Livewire\Component;

class Personal extends Component
{
    public $messages;

    public function mount()
    {
        $this->messages = [
            'Fullstack Developer',
            'Frontend Developer',
            'Backend Developer',
            'Data Analysis',
        ];
        $skills = ResumeSkill::all();
        foreach ($skills as $skill) {
            $this->messages[] = $skill->name;
        }
    }

    public function render()
    {
        return view('core.components.jumbotron.personal');
    }
}
