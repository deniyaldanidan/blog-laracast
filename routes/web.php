<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // DB::listen(function ($query) {
    //     logger($query->sql);
    // });

    return view('home', [
        "blogs" => Blog::latest("updated_at")->with(["category", "author"])->get()
    ]);
});

Route::get("/blog/view/{blog:slug}", function (Blog $blog) {
    // $blog = Blog::with(["category", "author"])->firstWhere("slug", $blog);
    /*
    if (!$blog) {
        return abort(404);
    }
    */

    return view("view-blog", [
        "blog" => $blog
    ]);
}); // ->whereNumber("blog");

Route::get("/blogs/category/{category:slug}", function (Category $category) {
    return view("categories", [
        "category" => $category,
    ]);
});

Route::get("/blogs/author/{author:username}", function (User $author) {
    return view("author-blogs", [
        "author" => $author
    ]);
});

Route::get("/about", function () {

    $word = "user";

    $info = cache()->remember("about.info", 60 * 60 /*! in seconds, cache remain for 3600secs */, function () use ($word) {
        return "Hello $word";
    });

    return view("about", [
        "info" => $info
    ]);
});

// collect()->
// abort, redirect, ddd, die