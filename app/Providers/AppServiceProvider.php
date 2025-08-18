<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
    }
}
