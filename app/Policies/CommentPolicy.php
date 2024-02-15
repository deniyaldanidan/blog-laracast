<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Response as HttpResponse;

class CommentPolicy
{

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function delete(User $user, Comment $comment)
    {
        return ($user->id === $comment->user_id) ? Response::allow() : Response::deny("Sorry, This is not your comment", HttpResponse::HTTP_FORBIDDEN);
    }
}
