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
            $companySetting = Company::first() ?? new Company;

            $view->with('companySetting', $companySetting ?? new Company);
        });

        View::composer('front-end.*', function ($view) {
            $pages = Page::orderBy('order', 'asc')->get();
            $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
                ->select(
                    'sections.*',
                    'pages.title',
                    'pages.slug'
                )
                ->where('pages.slug', request()->segment(1))
                ->where('sections.is_active', 1)
                ->first();

            $view->with([
                'pages' => $pages,
                'section' => $section
            ]);
        });
    }
}
