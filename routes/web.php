<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// move all to their appr.. controllers
Route::get('/', function () {
    $blogs = Blog::latest("updated_at")->with(["category", "author"]);

    if (request('search')) {
        $blogs->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%')
            ->orWhere('excerpt', 'like', '%' . request('search') . '%');
    }

    return view('home', [
        "blogs" => $blogs->get()
    ]);
})->name("home");

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
})->name("blog-view"); // ->whereNumber("blog");

Route::get("/blogs/category/{category:slug}", function (Category $category) {
    return view("categories", [
        "category" => $category,
    ]);
})->name("category");

Route::get("/blogs/author/{author:username}", function (User $author) {
    return view("author-blogs", [
        "author" => $author
    ]);
})->name("author-blogs");

Route::get("/about", function () {

    $word = "user";

    $info = cache()->remember("about.info", 60 * 60 /*! in seconds, cache remain for 3600secs */, function () use ($word) {
        return "Hello $word";
    });

    return view("about", [
        "info" => $info
    ]);
})->name("about");

// collect()->
// abort, redirect, ddd, die