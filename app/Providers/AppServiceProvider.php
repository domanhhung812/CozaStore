<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Sizes;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Categories::all();
        View::share('categories', $categories);

        $colors = Colors::all();
        View::share('colors', $colors);

        $sizes = Sizes::all();
        View::share('sizes', $sizes);
        if (!$this->app->isLocal()) {
            $this->app['request']->server->set('HTTPS', true);
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
