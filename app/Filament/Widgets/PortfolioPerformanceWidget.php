<?php

namespace App\Filament\Widgets;

use App\Models\Portfolio;
use App\Models\PortfolioGallery;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PortfolioPerformanceWidget extends StatsOverviewWidget
{


    protected function getStats(): array
    {
        // Total portfolio items
        $totalPortfolios = Portfolio::count();
        
        // Portfolios with galleries
        $portfoliosWithGalleries = Portfolio::whereHas('gallery')->count();
        
        // Recent portfolio additions (last 7 days)
        $recentPortfolios = Portfolio::where('created_at', '>=', now()->subDays(7))->count();
        
        // Portfolio completion rate (portfolios with galleries / total portfolios)
        $completionRate = $totalPortfolios > 0 ? round(($portfoliosWithGalleries / $totalPortfolios) * 100, 1) : 0;

        return [
            Stat::make('Total Portfolios', $totalPortfolios)
                ->description('All portfolio items')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary')
                ->chart([2, 3, 1, 4, 2, 3, 2]),

            Stat::make('With Galleries', $portfoliosWithGalleries)
                ->description('Portfolios with image galleries')
                ->descriptionIcon('heroicon-m-photo')
                ->color('success')
                ->chart([1, 2, 1, 3, 1, 2, 1]),

            Stat::make('Recent Additions', $recentPortfolios)
                ->description('Added in last 7 days')
                ->descriptionIcon('heroicon-m-plus-circle')
                ->color('info')
                ->chart([0, 1, 0, 2, 0, 1, 0]),

            Stat::make('Completion Rate', $completionRate . '%')
                ->description('Portfolios with galleries')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color($completionRate >= 80 ? 'success' : ($completionRate >= 50 ? 'warning' : 'danger'))
                ->chart([$completionRate, $completionRate, $completionRate, $completionRate, $completionRate, $completionRate, $completionRate]),
        ];
    }
}
