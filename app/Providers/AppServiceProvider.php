<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Schema;
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
        PaginationPaginator::useBootstrap();

        // check if table settings exists in db

        // ...

        if (Schema::hasTable('settings')) {
            // Share settings to all views
            $settings = Setting::pluck('value', 'key');
            view()->composer('*', function ($view) use ($settings) {
                $view->with('settings', $settings);
            });
        }

    }
}
