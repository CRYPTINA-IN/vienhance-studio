<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class ContactMessagesOverviewWidget extends StatsOverviewWidget
{


    protected function getStats(): array
    {
        // Total contacts received
        $totalContacts = Contact::count();
        
        // Unread messages count
        $unreadContacts = Contact::unread()->count();
        
        // Recent contacts (last 7 days)
        $recentContacts = Contact::where('created_at', '>=', now()->subDays(7))->count();
        
        // Contacts by country (from IP geolocation)
        $contactsByCountry = Contact::whereNotNull('location_data')
            ->select('location_data->country as country', DB::raw('count(*) as count'))
            ->groupBy('location_data->country')
            ->orderBy('count', 'desc')
            ->limit(1)
            ->first();

        $topCountry = $contactsByCountry ? $contactsByCountry->country : 'N/A';
        $topCountryCount = $contactsByCountry ? $contactsByCountry->count : 0;

        return [
            Stat::make('Total Contacts', $totalContacts)
                ->description('All time contact submissions')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Unread Messages', $unreadContacts)
                ->description('Messages requiring attention')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($unreadContacts > 0 ? 'danger' : 'success')
                ->chart([2, 1, 3, 0, 1, 2, 1]),

            Stat::make('Recent Contacts', $recentContacts)
                ->description('Last 7 days')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info')
                ->chart([3, 5, 2, 8, 4, 6, 3]),

            Stat::make('Top Country', $topCountry)
                ->description("{$topCountryCount} contacts from this country")
                ->descriptionIcon('heroicon-m-globe-alt')
                ->color('warning'),
        ];
    }
}
