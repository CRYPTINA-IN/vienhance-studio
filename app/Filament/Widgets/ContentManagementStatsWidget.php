<?php

namespace App\Filament\Widgets;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\StaticPage;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentManagementStatsWidget extends StatsOverviewWidget
{


    protected function getStats(): array
    {
        // Total services published
        $totalServices = Service::active()->count();
        
        // Total portfolios published
        $totalPortfolios = Portfolio::published()->count();
        
        // Total static pages
        $totalStaticPages = StaticPage::count();
        
        // Recent content updates (last 7 days)
        $recentServices = Service::where('updated_at', '>=', now()->subDays(7))->count();
        $recentPortfolios = Portfolio::where('updated_at', '>=', now()->subDays(7))->count();
        $recentStaticPages = StaticPage::where('updated_at', '>=', now()->subDays(7))->count();
        $totalRecentUpdates = $recentServices + $recentPortfolios + $recentStaticPages;

        return [
            Stat::make('Total Services', $totalServices)
                ->description('Active services published')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('primary')
                ->chart([5, 3, 8, 2, 6, 4, 7]),

            Stat::make('Total Portfolios', $totalPortfolios)
                ->description('Published portfolio items')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('success')
                ->chart([2, 4, 3, 6, 2, 5, 3]),

            Stat::make('Static Pages', $totalStaticPages)
                ->description('Total static pages')
                ->descriptionIcon('heroicon-m-document')
                ->color('info')
                ->chart([1, 2, 1, 3, 1, 2, 1]),

            Stat::make('Recent Updates', $totalRecentUpdates)
                ->description('Content updated in last 7 days')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->chart([$recentServices, $recentPortfolios, $recentStaticPages, 0, 0, 0, 0]),
        ];
    }
}
