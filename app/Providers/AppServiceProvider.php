<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        Blade::directive('api_token', function () {
            $token = optional(auth()->user())->createToken('personal-token')->plainTextToken;
            return "<div id='api-token' hidden data-token=$token></div>";
        });
        Blade::if('admin', function () {
            return optional(auth()->user())->isAdmin();
        });
    }
}
