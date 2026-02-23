<?php

use App\Http\Controllers\Frontend\CompanyProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [CompanyProfileController::class, 'page'])->defaults('slug', 'index');
    Route::get('{slug}', [CompanyProfileController::class, 'page']);
});
