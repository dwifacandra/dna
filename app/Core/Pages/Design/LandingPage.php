<?php

namespace App\Core\Pages\Design;

use App\Models\Project;
use Livewire\Component;

class LandingPage extends Component
{
    public $projects;
    public function mount()
    {
        $this->projects = Project::where('release', true)
            ->with(['media' => function ($query) {
                $query->where('collection_name', 'projects')
                    ->where('custom_properties->scope', 'cover');
            }])
            ->orderBy('featured', 'desc')
            ->orderBy('end_date', 'desc')
            ->take(20)
            ->get();
    }
    public function render()
    {
        return view('core.pages.design.landing-page');
    }
}
