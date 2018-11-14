<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\MenuCategory;
use App\Role;
use App\Perumahan;
use App\RumahType;
use App\DocumentType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->runningInConsole()) {

            View::share('roles', Role::all());
            View::share('listPerumahan', Perumahan::all());
            View::share('rumahType', RumahType::all());
            View::share('documentType', DocumentType::all());
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
