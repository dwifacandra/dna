<?php

namespace App\Core\Clusters\Projects\Resources\PortfolioResource\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Filament\Support\RawJs;

class BudgetPortfolioChart extends ChartWidget
{
    protected static ?string $maxHeight = '15rem';

    protected function getData(): array
    {
        $data = Project::selectRaw("strftime('%Y-%m', start_date) as month_year, SUM(budget) as total_budget")
            ->where('publish_to_portfolio', true)
            ->groupBy('month_year')
            ->orderBy('month_year', 'desc')
            ->get();

        $labels = [];
        $totalBudgets = [];

        foreach ($data as $item) {
            $monthYear = \DateTime::createFromFormat('Y-m', $item->month_year);
            $labels[] = $monthYear->format('M-y');
            $totalBudgets[] = $item->total_budget;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Budget Portfolio',
                    'data' => $totalBudgets,
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

    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
        {
            scales: {
                y: {
                    ticks: {
                        callback: (value) => 'Rp. ' + value.toLocaleString('id-ID'),
                    },
                },
            },
            plugins: {
            tooltip: {
                callbacks: {
                    label: (tooltipItem) => {
                        const value = tooltipItem.raw;
                        return ' Rp. ' + value.toLocaleString('id-ID');
                    },
                },
            },
        },
        }
    JS);
    }
}
