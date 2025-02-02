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
    }
    public function render()
    {
        return view('core.pages.product.detail');
    }
}
