<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        // return $request->all();
        $request->validate([
            "blogid" => ["required", "integer", "exists:blogs,id"],
            "content" => ["required", "string", "max:1000", "min:2"]
        ]);
        Comment::create(["content" => (string) $request->input("content"), "blog_id" => (int) $request->input("blogid"), "user_id" => auth()->user()->id]);
        return back()->with("success", "Comment is created successfully");
    }

    public function delete(Comment $comment)
    {
        Gate::authorize("delete", $comment);

        $comment->delete();
        return back()->with("success", "Comment is deleted");
    }
}
