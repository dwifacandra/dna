<?php

namespace App\Core\Clusters\Developments\Resources\VisitorResource\Widgets;

use App\Core\Enums\Locale;
use App\Models\Visitor;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class LocaleChart extends ChartWidget
{
    protected static ?string $maxHeight = '15rem';
    public ?string $filter = 'week';
    protected function getData(): array
    {
        $visitors = Visitor::totalByLocale()->get();
        $labels = $visitors->pluck('locale')->map(fn($locale) => $locale->getLabel())->toArray();
        $data = $visitors->pluck('total')->toArray();
        $backgroundColors = [
            'rgba(75, 192, 192, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
        ];
        $colors = array_map(function ($index) use ($backgroundColors) {
            return $backgroundColors[$index % count($backgroundColors)];
        }, array_keys($labels));
        $icons =  $visitors->pluck('locale')->map(fn($locale) => $locale->getIcon())->toArray();
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Locale Visitors',
                    'data' => $data,
                    'backgroundColor' => $colors,
                    'icons' => $icons,
                ],
            ],
        ];
    }
    protected function getType(): string
    {
        return 'pie';
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
