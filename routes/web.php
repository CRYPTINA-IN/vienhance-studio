<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services');
    Route::get('/services/{slug}', 'serviceDetail')->name('service.detail');
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/portfolio/{slug}', 'portfolioDetail')->name('portfolio.detail');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/submit', 'submitContactForm')->name('contact.submit');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{slug}', 'blogDetail')->name('blog.detail');
    Route::get('/pages/{slug}', 'seoPage')->name('pages.show');
});

// Sitemap routes
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/robots.txt', [App\Http\Controllers\SitemapController::class, 'robots']);
