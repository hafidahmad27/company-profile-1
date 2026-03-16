<?php

use App\Http\Controllers\Backend\ArticleCategoryController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

// Include auth
require __DIR__ . '/auth.php';

// Route back-end
Route::prefix('be')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);
    Route::resource('product-categories', ProductCategoryController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);
    Route::resource('articles', ArticleController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);
    Route::resource('article-categories', ArticleCategoryController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);
    Route::resource('pages', PageController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);
    Route::resource('sections', SectionController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);
    Route::resource('settings', SettingController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// Include route front-end (webfrontend.php)
require __DIR__ . '/webfrontend.php';
