<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\BlogTag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Blog Posts', Blog::count())
                ->description('All blog posts')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Published Posts', Blog::where('status', 'published')->count())
                ->description('Live on website')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Draft Posts', Blog::where('status', 'draft')->count())
                ->description('In progress')
                ->descriptionIcon('heroicon-m-pencil')
                ->color('warning'),

            Stat::make('Total Tags', BlogTag::count())
                ->description('Available tags')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),

            Stat::make('Total Views', Blog::sum('view_count'))
                ->description('Combined views')
                ->descriptionIcon('heroicon-m-eye')
                ->color('success'),
        ];
    }
}
