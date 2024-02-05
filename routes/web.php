<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', [
        "blogs" => Blog::all()
    ]);
});

//? Matches according to the slug
Route::get("/blog/view/{blog:slug}", function (Blog $blog) {
    return view("view-blog", [
        "blog" => $blog
    ]);
});
// ->whereNumber("blog");

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