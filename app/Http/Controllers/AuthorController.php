<?php

namespace App\Http\Controllers;

use App\Models\AuthorRequests;
use App\Models\Blog;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function beAuthor()
    {
        if (request()->user()->can("isAuthor")) {
            return redirect("/");
        }
        return view("author.be-author");
    }

    public function beAuthorSubmit(Request $request)
    {
        $currUser = request()->user();

        if ($currUser->can("isAuthor")) {
            return redirect("/");
        }

        $request->validate([
            "content" => "required|string|max:700|min:50"
        ]);

        $currUser->author_request()->create([
            "content" => request("content")
        ]);

        return redirect("/")->with("success", "Successfully, requested.");
    }

    public function privateView(Request $request, Blog $blog)
    {
        if (!$request->user()->can("viewUnPublish", $blog)) {
            return redirect("/")->with("warn", "Access Denied");
        }

        return view("author.protected-blog-view", [
            "blog" => $blog
        ]);
    }

    public function myBlogs(Request $request)
    {
        $currUser = $request->user();
        return view("author.my-blogs", [
            "blogs" => $currUser->blogs()->with("category")->get(),
            "currUser" => $currUser
        ]);
    }
}
