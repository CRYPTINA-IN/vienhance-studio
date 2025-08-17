<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services');
    Route::get('/services/{slug}', 'serviceDetail')->name('service.detail');
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/portfolio/{slug}', 'portfolioDetail')->name('portfolio.detail');
    Route::get('/contact', 'contact')->name('contact');
});

// Sitemap routes
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/robots.txt', [App\Http\Controllers\SitemapController::class, 'robots']);

// Test SEO route
Route::get('/test-seo', function() {
    \App\Services\SeoService::setSeoForPage('home');
    return view('test-seo');
});
