<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        /**
         * Will merge queries
         * 
         */
        // Blade::directive("querymerger", function (array $queryToMerge): string {
        //     return "?" . request()->collect()->merge($queryToMerge)->map(fn($value, $key) => "$key=$value")->values()->join("&");
        // });
    }
}
