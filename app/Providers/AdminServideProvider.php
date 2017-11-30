<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminServideProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.partials.header', function ($view) {
            $view->with('user', Auth::guard('admin')->user());
        });

        View::composer('admin.partials.navigation', function ($view) {
            $navigation = $this->app['navigation']->all();
            $view->with('navigation', $navigation);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
