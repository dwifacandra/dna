<?php

namespace App\Core\Pages\Blog;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;

class LandingPage extends Component
{
    public $projects;
    public $categories;
    public function mount()
    {
        $this->categories = Category::where('scope', 'project')
            ->whereHas('projects', function ($query) {
                $query->where('release', true);
            })
            ->withCount(['projects' => function ($query) {
                $query->where('release', true);
            }])
            ->get();
        foreach ($this->categories as $category) {
            $category->projects = Project::where('release', true)
                ->where('category_id', $category->id)
                ->with(['media' => function ($query) {
                    $query->where('collection_name', 'projects')
                        ->where('custom_properties->scope', 'cover');
                }])
                ->orderBy('featured', 'desc')
                ->orderBy('end_date', 'desc')
                ->take(16)
                ->get();
        }
    }
    public function render()
    {
        return view('core.pages.blog.landing-page');
    }
}
