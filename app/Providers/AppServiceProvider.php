<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;   // ✅ This import was missing
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

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
    }
}
