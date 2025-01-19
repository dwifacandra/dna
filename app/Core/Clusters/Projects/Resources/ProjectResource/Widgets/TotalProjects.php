<?php

namespace App\Core\Clusters\Projects\Resources\ProjectResource\Widgets;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalProjects extends BaseWidget
{
    protected function getStats(): array
    {
        $statusOrder = [
            'Pending',
            'Backlog',
            'In Review',
            'In Progress',
            'Ready',
            'Done',
        ];

        $statuses = Project::select('status')
            ->groupBy('status')
            ->where('publish_to_portfolio', false)
            ->get()
            ->pluck('status');

        $stats = [];

        foreach ($statuses as $status) {
            $statusName = $status->getLabel();
            $count = Project::where('status', $status)->where('publish_to_portfolio', false)->count();
            $stats[] = [
                'name' => $statusName,
                'count' => $count,
            ];
        }

        usort($stats, function ($a, $b) use ($statusOrder) {
            $posA = array_search($a['name'], $statusOrder);
            $posB = array_search($b['name'], $statusOrder);
            return $posA - $posB;
        });

        $formattedStats = [];
        foreach ($stats as $stat) {
            $formattedStats[] = Stat::make($stat['name'], $stat['count']);
        }

        return $formattedStats;
    }
}
