<?php

namespace App\Providers;

use App\College;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::enableForeignKeyConstraints();
        Schema::defaultStringLength(191);

        if (env('APP_ENV') === 'production' ) {
            \URL::forceScheme('https');
        }

        try {
            View::share('colleges', College::all());
        } catch (\Throwable $th) {
            View::share('colleges', []);
        }

    }
}
