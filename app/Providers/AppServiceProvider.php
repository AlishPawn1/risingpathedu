<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;

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
        Blade::if('active', function (string $pattern) {
            return Str::is($pattern, request()->route()?->getName() ?? '');
        });
        View::composer('*', function ($view) {
            $siteSetting = SiteSetting::first();
            $view->with('siteSetting', $siteSetting);

            $allServices = Service::all();
            $view->with('allServices', $allServices);
        });
    }
}
