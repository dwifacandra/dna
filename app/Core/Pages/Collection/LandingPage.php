<?php

namespace App\Core\Pages\Collection;

use App\Core\Enums\CollectionStatus;
use App\Models\{Collection, Category};
use Livewire\Component;

class LandingPage extends Component
{
    public $collections;
    public $categories;
    public function mount()
    {
        $this->categories =
            Category::where('scope', 'collection')
            ->whereHas('collections', function ($query) {
                $query->where('status', CollectionStatus::PUBLISH);
            })
            ->withCount(['collections' => function ($query) {
                $query->where('status', CollectionStatus::PUBLISH);
            }])
            ->get();
        foreach ($this->categories as $category) {
            $category->collections =
                Collection::where('status', CollectionStatus::PUBLISH)
                ->where('category_id', $category->id)
                ->with(['media' => function ($query) {
                    $query->where('collection_name', 'collections')
                        ->where('custom_properties->scope', 'cover');
                }])
                ->orderBy('created_at', 'desc')
                ->take(32)
                ->get();
        }
    }
    public function render()
    {
        return view('core.pages.collection.landing-page');
    }
}
