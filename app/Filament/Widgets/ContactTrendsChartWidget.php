<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ContactTrendsChartWidget extends ChartWidget
{
    protected ?string $heading = 'Contact Trends (Last 30 Days)';

    protected function getData(): array
    {
        $days = collect();
        $contactCounts = collect();

        // Generate data for last 30 days
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $days->push($date->format('M d'));
            
            $count = Contact::whereDate('created_at', $date)->count();
            $contactCounts->push($count);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Contacts',
                    'data' => $contactCounts->toArray(),
                    'borderColor' => '#3B82F6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $days->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
        ];
    }
}
