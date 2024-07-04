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
            return "<?php
            \$user = auth()->user();
            \$token = \$user ? \$user->createToken('personal-token')->plainTextToken : false;
            echo '<div id=\"api-token\" hidden data-token=\"' . htmlspecialchars(\$token, ENT_QUOTES, 'UTF-8') . '\"></div>'; ?>";
        });

        Blade::if('admin', function () {
            return optional(auth()->user())->isAdmin();
        });
    }
}
