<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Section;
use App\Models\Company;
use App\Observers\SectionObserver;
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
        // load Observer class
        Section::observe(SectionObserver::class);

        Carbon::setLocale('id');
        Paginator::useBootstrapFive();

        View::composer('*', function ($view) {
            $globalSetting = Company::first() ?? new Company;

            $view->with('globalSetting', $globalSetting ?? new Company);
        });

        View::composer('front-end.*', function ($view) {
            $pages = Page::where('is_active', 1)->orderBy('order')->get();

            $view->with('pages', $pages);
        });
    }
}
