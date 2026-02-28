<?php

use App\Http\Controllers\Frontend\CompanyProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompanyProfileController::class, 'page'])->defaults('slug', 'index');
Route::get('{slug}', [CompanyProfileController::class, 'page']);
Route::get('{page_slug}/{category_slug}/{slug}', [CompanyProfileController::class, 'show']);
