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
Route::prefix('be')->name('be.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::patch('products/{product}/togglePublish', [ProductController::class, 'togglePublish'])
        ->name('product.togglePublish');

    Route::resource('product-categories', ProductCategoryController::class);
    Route::patch('product-categories/{product_category}/updateActiveStatus', [ProductCategoryController::class, 'updateActiveStatus'])
        ->name('product-categories.updateActiveStatus');

    Route::resource('articles', ArticleController::class);
    Route::patch('articles/{article}/togglePublish', [ArticleController::class, 'togglePublish'])
        ->name('article.togglePublish');

    Route::resource('article-categories', ArticleCategoryController::class);
    Route::patch('article-categories/{article_category}/updateActiveStatus', [ArticleCategoryController::class, 'updateActiveStatus'])
        ->name('article-categories.updateActiveStatus');

    // Route::resource('sections', SectionController::class)->only([
    //     'index',
    //     'create',
    //     'store',
    //     'edit',
    //     'update',
    //     'destroy'
    // ]);


    Route::resource('settings', SettingController::class)->only([
        'index',
        'update'
    ]);
    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::put('bulkUpdate', [PageController::class, 'bulkUpdate'])->name('bulkUpdate');
        Route::get('{page}', [PageController::class, 'show'])->name('show');

        Route::prefix('sections')->name('sections.')->group(function () {
            Route::put('bulkUpdate', [PageController::class, 'bulkUpdateSection'])->name('bulkUpdate');
        });
    });
    Route::prefix('profile')->group(function () {
        // Route::get('dashboard', [ProfileController::class, 'index'])->name('profile.dashboard');
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// Include route front-end (webfrontend.php)
require __DIR__ . '/webfrontend.php';
