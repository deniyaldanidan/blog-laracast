<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Comment;
use App\Models\User;
use App\Policies\CommentPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("isAdmin", function (User $user) {
            return (is_array($user->roles) && in_array("admin", $user->roles)) ? Response::allow() : Response::denyWithStatus(HttpResponse::HTTP_FORBIDDEN, "You don't have required permission.");
        });
        Gate::define("isAuthor", function (User $user) {
            return (is_array($user->roles) && in_array("author", $user->roles)) ? Response::allow() : Response::denyWithStatus(HttpResponse::HTTP_FORBIDDEN, "You need to be an author to access this resource.");
        });
    }
}
