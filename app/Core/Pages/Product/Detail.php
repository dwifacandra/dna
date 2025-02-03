<?php

namespace App\Core\Pages\Product;

use App\Models\Project;
use Livewire\Component;

class Detail extends Component
{
    public $slug;
    public $project;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->project = Project::where('slug', $this->slug)->first();
        if (!$this->project) {
            abort(404);
        }
    }
    public function render()
    {
        return view('core.pages.product.detail', [
            'breadcrumbItems' => [
                ['label' => 'Home', 'url' => route('landing-page')],
                ['label' => 'Product', 'url' => null],
                ['label' => $this->project->category->name, 'url' => null],
                ['label' => $this->project->name, 'url' => null],
            ],
        ]);
    }
}
