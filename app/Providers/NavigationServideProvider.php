<?php

namespace App\Providers;

use App\Support\Navigation\Navigation;
use App\Support\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class NavigationServideProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $navigation = $this->app->make('navigation');

        $navigation->register(new NavigationItem(
            'admin.index', 'Bảng thông tin', 'admin.index', '*', 'fa fa-fw fa-home'
        ));
        $navigation->register(new NavigationItem(
            'admin.accounts', 'Tài khoản', null, 'accounts', 'fa fa-fw fa-users', [
                new NavigationItem('admin.accounts.users.index', 'Tài khoản', 'admin.accounts.users.index', 'accounts.users.index'),
                new NavigationItem('admin.accounts.groups.index', 'Nhóm tài khoản', 'admin.accounts.groups.index', 'accounts.groups.index')
            ]
        ));
        $navigation->register(new NavigationItem(
            'admin.pages.index', 'Trang nội dung', 'admin.pages.index', '*', 'fa fa-fw fa-file-text'
        ));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('navigation', function ($app) {
            return new Navigation();
        });
    }
}
