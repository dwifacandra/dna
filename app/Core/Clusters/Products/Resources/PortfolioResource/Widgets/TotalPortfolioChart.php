<?php

namespace App\Core\Clusters\Products\Resources\PortfolioResource\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class TotalPortfolioChart extends ChartWidget
{
    protected static ?string $maxHeight = '15rem';

    protected function getData(): array
    {
        $data = Project::selectRaw("strftime('%Y-%m', start_date) as month_year, COUNT(*) as total")
            ->where('release', true)
            ->groupBy('month_year')
            ->orderBy('month_year', 'desc')
            ->get();

        $labels = [];
        $totalPortfolio = [];

        foreach ($data as $item) {
            $monthYear = \DateTime::createFromFormat('Y-m', $item->month_year);
            $labels[] = $monthYear->format('M-y');
            $totalPortfolio[] = $item->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Portfolio',
                    'data' => $totalPortfolio,
                    'backgroundColor' => '#ecfdf5',
                    'borderColor' => '#0d9488',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
