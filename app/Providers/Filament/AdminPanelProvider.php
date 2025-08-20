<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use App\Filament\Widgets\ContactMessagesOverviewWidget;
use App\Filament\Widgets\ContentManagementStatsWidget;
use App\Filament\Widgets\PortfolioPerformanceWidget;
use App\Filament\Widgets\ContactTrendsChartWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->sidebarFullyCollapsibleOnDesktop()
            ->maxContentWidth('full')
            ->brandName('Vienhance Studio')
            ->brandLogo(asset('images/logo.svg'))
            ->brandLogoHeight('2.5rem')
            ->darkMode()
            ->colors([
                'primary' => Color::Amber,
                'gray' => Color::Slate,
            ])
            ->renderHook(
                'panels::head.end',
                fn (): string => '<style>
                    .fi-topbar { background-color: #000000 !important; border-bottom-color: #1f2937 !important; }
                    .fi-topbar .fi-topbar-content { background-color: #000000 !important; }
                    .fi-topbar .fi-brand { color: #ffffff !important; }
                    .fi-topbar .fi-brand-logo { filter: brightness(0) invert(1) !important; }
                    .fi-topbar .fi-user-menu { background-color: #000000 !important; }
                    .fi-topbar .fi-user-menu-trigger { color: #ffffff !important; }
                    .fi-topbar .fi-global-search { background-color: #1f2937 !important; }
                    .fi-topbar .fi-global-search-input { background-color: #1f2937 !important; color: #ffffff !important; border-color: #374151 !important; }
                    .fi-topbar .fi-notifications-trigger { color: #ffffff !important; }
                    .fi-topbar .fi-sidebar-toggle { color: #ffffff !important; }
                    .fi-topbar .fi-topbar-actions { background-color: #000000 !important; }
                    .fi-topbar .fi-topbar-actions > * { color: #ffffff !important; }
                </style>'
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
                ContactMessagesOverviewWidget::class,
                ContentManagementStatsWidget::class,
                PortfolioPerformanceWidget::class,
                ContactTrendsChartWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
