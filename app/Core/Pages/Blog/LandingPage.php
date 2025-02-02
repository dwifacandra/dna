<?php

namespace App\Core\Pages\Blog;

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
            ->take(6)
            ->get();
    }
    public function render()
    {
        return view('core.pages.blog.landing-page');
    }
}
