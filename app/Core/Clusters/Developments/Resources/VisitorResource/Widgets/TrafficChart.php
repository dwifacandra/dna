<?php

namespace App\Core\Clusters\Developments\Resources\VisitorResource\Widgets;

use Carbon\Carbon;
use App\Models\Visitor;
use Flowframe\Trend\Trend;
use Illuminate\Support\Str;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TrafficChart extends ChartWidget
{
    protected static ?string $maxHeight = '15rem';
    public ?string $filter = 'week';
    protected function getData(): array
    {
        $activeFilter = $this->filter;
        $data = Trend::model(Visitor::class);
        switch ($activeFilter) {
            case 'week':
                $data = $data->between(
                    start: now()->startOfWeek(),
                    end: now()->endOfWeek(),
                )
                    ->perDay()
                    ->count();
                $formatLabel = 'd-M';
                break;
            case 'month':
                $data = $data->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                    ->perMonth()
                    ->count();
                $formatLabel = 'M';
                break;
            case 'year':
                $data = $data->between(
                    start: now()->startOfDecade(),
                    end: now()->endOfDecade(),
                )
                    ->perYear()
                    ->count();
                $formatLabel = 'Y';
                break;
        }
        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 0.4)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => Carbon::parse($value->date)->format($formatLabel)),
        ];
    }
    protected function getType(): string
    {
        return 'bar';
    }
    protected function getFilters(): ?array
    {
        return [
            'week' => 'Weekly',
            'month' => 'Monthly',
            'year' => 'Yearly',
        ];
    }
}
