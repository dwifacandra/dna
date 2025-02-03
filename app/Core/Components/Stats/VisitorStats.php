<?php

namespace App\Core\Components\Stats;

use Livewire\Component;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorStats extends Component
{
    public $totalVisitors;
    public $uniqueVisitors;
    public $visitorsToday;
    public $mostVisitedPage;
    public function mount()
    {
        $this->loadStats();
    }
    public function loadStats()
    {
        $this->totalVisitors = Visitor::count();
        $this->uniqueVisitors = Visitor::distinct('ip_address')->count('ip_address');
        $this->visitorsToday = Visitor::whereDate('created_at', Carbon::today())->count();
    }
    public function render()
    {
        return view('core.components.stats.visitor-stats');
    }
}
