<?php

namespace App\Core\Components\Project;

use App\Core\Enums\ProjectStatus;
use App\Models\Project;
use Livewire\Component;

class LandingPage extends Component
{
    public $projects;
    public function mount()
    {
        $this->projects = Project::where('release', true)
            ->orderBy('featured', 'desc')
            ->orderBy('end_date', 'desc')
            ->take(8)
            ->get();
    }
    public function render()
    {
        return view('core.components.project.landing-page');
    }
}
