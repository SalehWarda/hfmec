<?php

namespace App\Providers;

use App\Models\Backend\NewCompany;
use App\Models\Backend\Service;
use App\Models\Backend\Settings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();

        view()->composer('partials.frontend.main_header',function ($view){

            $view->with('services',Service::get());
        });

        view()->composer('partials.frontend.footer',function ($view){

            $view->with('services',Service::get());
        });

        view()->composer('partials.frontend.main_header',function ($view){

            $view->with('settings',Settings::first());
        });

        view()->composer('partials.frontend.footer',function ($view){

            $view->with('settings',Settings::first());
        });

        view()->composer('partials.frontend.footer',function ($view){

            $view->with('news',NewCompany::first());
        });

    }
}
