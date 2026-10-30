<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('about')->name('about.')->controller(AboutController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{category_slug}/{slug}', 'show')->name('show');
});

Route::prefix('articles')->name('articles.')->controller(ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{category_slug}/{slug}', 'show')->name('show');
});

Route::prefix('contact')->name('contact.')->controller(ContactController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');
});
