<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services');
    Route::get('/services/{slug}', 'serviceDetail')->name('service.detail');
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/contact', 'contact')->name('contact');
});
