<?php

use Illuminate\Support\Facades\Route;

// make hompage controller
Route::get('/', \App\Http\Controllers\WebsiteController::class . '@index')->name('index');
