<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);
Route::resource('blog_posts', BlogPostController::class);
Route::get('/test-log', function () {
    Log::info('Test log entry.');
    return 'Log entry created.';
});
