<?php

namespace App\Core\Components\Stats;

use Livewire\Component;
use App\Models\{Project, Customer};
use App\Core\Enums\ProjectStatus;

class Footer extends Component
{
    public $stats;
    public function mount()
    {
        $this->stats = [
            [
                'title' => __('landingPage.stats.services.title'),
                'description' => __('landingPage.stats.services.description'),
                'count' => 0,
            ],
            [
                'title' => __('landingPage.stats.portfolio.title'),
                'description' => __('landingPage.stats.portfolio.description'),
                'count' => Project::countPortfolio(),
            ],
            [
                'title' => __('landingPage.stats.projects.title'),
                'description' => __('landingPage.stats.projects.description'),
                'count' => Project::countByStatus([ProjectStatus::Done, ProjectStatus::Ready]),
            ],
            [
                'title' => __('landingPage.stats.customers.title'),
                'description' => __('landingPage.stats.customers.description'),
                'count' => Customer::count(),
            ],
        ];
    }
    public function render()
    {
        return view('core.components.stats.footer');
    }
}
