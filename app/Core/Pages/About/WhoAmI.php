<?php

namespace App\Core\Pages\About;

use Livewire\Component;
use App\Models\Category;
use App\Models\ResumeCompany;

class WhoAmI extends Component
{
    public $skillGroups;
    public $companies;
    public function mount()
    {
        $this->skillGroups = Category::has('skills')
            ->where('scope', 'resume_skill')
            ->with('skills')
            ->get()
            ->sortByDesc(function ($category) {
                return $category->skills->count();
            });
        $this->companies = ResumeCompany::has('experiences')
            ->with(['media' => function ($query) {
                $query->where('collection_name', 'companies')
                    ->where('custom_properties->scope', 'logo');
            }])
            ->with(['experiences' => function ($query) {
                $query
                    ->orderBy('end_date', 'desc');
            }])
            ->take(5)
            ->get()
            ->sortByDesc(function ($company) {
                return $company->experiences->max('end_date');
            })
            ->values();
    }
    public function render()
    {
        return view('core.pages.about.whoami', [
            'breadcrumbItems' => [
                ['label' => 'Home', 'url' => route('landing-page')],
                ['label' => 'About', 'url' => route('about')],
                ['label' => 'Who Am I', 'url' => null],
            ],
        ])->title('About');
    }
}
