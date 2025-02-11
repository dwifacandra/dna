<?php

namespace App\Core\Clusters\Developments\Resources\VisitorResource\Widgets;

use App\Models\Visitor;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TrafficChart extends ChartWidget
{
    protected static ?string $maxHeight = '15rem';

    protected function getData(): array
    {
        $visitors = Visitor::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subMonth())
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $labels = $visitors->pluck('date')->toArray();
        $data = $visitors->pluck('total')->toArray();
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Visitors',
                    'data' => $data,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }
    protected function getType(): string
    {
        return 'line';
    }
}
