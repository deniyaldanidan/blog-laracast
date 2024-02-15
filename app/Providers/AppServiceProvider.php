<?php

namespace App\Providers;

use App\Services\INewsletter;
use App\Services\Mailchimp;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(INewsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server')
            ]);

            return new Mailchimp($client);
        });
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
