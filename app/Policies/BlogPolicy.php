<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewUnpublish(User $user, Blog $blog)
    {
        if (is_array($user->roles) && in_array("admin", $user->roles)) {
            return true;
        }

        if ($blog->user_id == $user->id) {
            return true;
        }

        return false;
    }

    public function blogOwner(User $user, Blog $blog)
    {
        // dd($blog->user_id === $user->id);
        return ($blog->user_id == $user->id) ? Response::allow() : Response::deny("You're not allowed to mutate this post");
    }
}
