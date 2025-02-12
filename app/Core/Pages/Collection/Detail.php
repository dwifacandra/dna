<?php

namespace App\Core\Pages\Collection;

use Livewire\Component;
use App\Models\Collection;

class Detail extends Component
{
    public $slug;
    public $collection;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->collection = Collection::where('slug', $this->slug)->first();
        if (!$this->collection) {
            abort(404);
        }
    }
    public function render()
    {
        return view('core.pages.collection.detail', [
            'breadcrumbItems' => [
                ['label' => 'Home', 'url' => route('landing-page')],
                ['label' => 'Collection', 'url' => null],
                ['label' => $this->collection->scope, 'url' => null],
                ['label' => $this->collection->category->name, 'url' => null],
                ['label' => $this->collection->title, 'url' => null],
            ],
        ])->title($this->collection->title);
    }
}
