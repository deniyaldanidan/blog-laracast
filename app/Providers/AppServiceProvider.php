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
        // isadmin-blade-if
        Blade::if("isAdmin", function () {
            return auth()->check() && request()->user()->can("isAdmin");
        });

        // isauthor-blade-if
        Blade::if("isAuthor", function () {
            return auth()->check() && request()->user()->can("isAuthor");
        });
    }
}
