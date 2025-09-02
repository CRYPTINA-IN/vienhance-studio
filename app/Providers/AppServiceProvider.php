<?php

namespace App\Providers;

use App\Models\SeoPage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Helper function for storage URLs
        Blade::directive('storage', function ($expression) {
            return "<?php echo asset('storage/' . $expression); ?>";
        });

        // Helper function for image URLs
        Blade::directive('image', function ($expression) {
            return "<?php 
                \$path = $expression;
                if (str_starts_with(\$path, 'storage/')) {
                    echo asset(\$path);
                } elseif (str_starts_with(\$path, 'uploads/')) {
                    echo asset('storage/' . \$path);
                } else {
                    echo asset('storage/uploads/' . \$path);
                }
            ?>";
        });

        // Share published SEO pages with the footer view
        View::composer('layouts.footer', function ($view) {
            $seoPages = SeoPage::published()
                ->orderBy('published_at', 'desc')
                ->select(['title', 'slug'])
                ->get()
                ->map(function ($page) {
                    return [
                        'title' => $page->title,
                        'url' => route('pages.show', $page->slug),
                    ];
                });

            $view->with('footerSeoPages', $seoPages);
        });
    }
}
