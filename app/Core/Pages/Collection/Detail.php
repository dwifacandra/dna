<?php

namespace App\Core\Pages\Collection;

use Livewire\Component;
use App\Models\Collection;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

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
        SEOMeta::setTitle($this->collection->title);
        SEOMeta::setDescription(
            Str::words(Str::of($this->collection->description)
                ->stripTags()
                ->headline(), 25)
        );
        SEOMeta::addKeyword($this->collection->keywords);
        SEOMeta::addMeta('author', $this->collection->author->name);
        SEOMeta::addMeta('article:section', $this->collection->category->name, 'property');
        SEOMeta::addMeta('article:published_time', $this->collection->created_at->toW3CString(), 'property');
        OpenGraph::setTitle($this->collection->title)
            ->setDescription(
                Str::words(Str::of($this->collection->description)
                    ->stripTags()
                    ->headline(), 25)
            )
            ->setType('collections')
            ->addImage($this->collection->titlel)
            ->setArticle([
                'published_time' => $this->collection->created_at,
                'author' => $this->collection->author->name,
                'section' => $this->collection->category->name,
                'tag' => $this->collection->tags
            ]);
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
        ]);
    }
}
