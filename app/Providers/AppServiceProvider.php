<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('id');
        Paginator::useBootstrapFive();

        View::composer('front-end.*', function ($view) {
            $pages = Page::where('is_active', 1)->orderBy('order')->get();
            $setting = Setting::first();

            $view->with('pages', $pages)
                ->with('setting', $setting);
        });
    }
}
