<?php

namespace App\Http\Controllers;

use App\Models\AuthorRequests;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index", [
            "users" => User::latest("created_at")->select("name", "username", "roles")->get()
        ]);
    }

    public function authorRequests()
    {
        return view("admin.author-requests", [
            "author_requests" => AuthorRequests::latest("created_at")->with("user")->get()
        ]);
    }

    public function acceptAuthorReqs(Request $request)
    {
        $request->validate([
            "authorUsername" => ["required", "exists:users,username"]
        ]);

        $user = User::where("username", $request->input("authorUsername"))->first();

        $user->author_request()->delete();

        // check if he's already an author, if ignore him
        if (is_array($user->roles) && in_array("author", $user->roles)) {
            return redirect()->route("author-requests")->with("warn", "User is already an author");
        }

        $user->roles = is_array($user->roles) ? ["author", ...$user->roles] : ["author"];

        $user->save();

        return redirect()->route("author-requests")->with("success", "Operation successfull");
    }

    public function viewUnpublish()
    {
        return view("admin.publish-blogs", [
            "blogs" => Blog::whereNull("published_at")->latest("updated_at")->with(["category", "author"])->get()
        ]);
    }

    public function publishBlog(Request $request)
    {
        $request->validate([
            "blogId" => "required|exists:blogs,id"
        ]);

        $blog = Blog::find($request->input("blogId"));
        $blog->published_at = now();
        $blog->save();
        return redirect()->route("publish-blogs")->with("success", "Blog is successfully published");
    }
}
