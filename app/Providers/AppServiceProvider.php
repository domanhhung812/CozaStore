<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Products;
use Illuminate\Support\Facades\View;
use DB;

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

        $products = DB::table('products')->get();
        view()->share('products', $products);

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
