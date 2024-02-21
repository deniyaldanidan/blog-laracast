<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, "index"])->name("home");

Route::get("/blog/view/{blog:slug}", [BlogController::class, "view"])->name("blog-view");

//! CommentController here 
Route::post("/comment", [CommentController::class, "create"])->name("create-comment")->middleware("auth");
Route::delete("/comment/{comment}", [CommentController::class, "delete"])->name("delete-comment")->whereNumber("comment")->middleware("auth");

Route::get("/about", function () {
    // dd();
    return view("about", [
        "info" => "Apple is awesome"
    ]);
})->name("about");

Route::get("/register", [RegisterController::class, "create"])->name("register")->middleware("guest");
Route::post("/register", [RegisterController::class, "store"])->middleware("guest");

Route::get("/login", [LoginController::class, "loginView"])->name("login")->middleware("guest");
Route::post("/login", [LoginController::class, "login"])->middleware("guest");

Route::post("/logout", [LogoutController::class, "logout"])->name("logout")->middleware("auth");

Route::post("/newsletter", NewsletterController::class);

//! AdminController here 
Route::get("/admin", [AdminController::class, "index"])->middleware("can:isAdmin")->name("admin-dashboard");
Route::get("/author-requests", [AdminController::class, "authorRequests"])->middleware("can:isAdmin")->name("author-requests");
Route::post("/author-requests", [AdminController::class, "acceptAuthorReqs"])->middleware("can:isAdmin");
Route::get("/publish-blogs", [AdminController::class, "viewUnpublish"])->middleware("can:isAdmin")->name("publish-blogs");
Route::post("/publish-blog", [AdminController::class, "publishBlog"])->middleware("can:isAdmin");

//! AuthorController here
Route::get("/be-author", [AuthorController::class, "beAuthor"])->name("be-author");
Route::post("/be-author", [AuthorController::class, "beAuthorSubmit"]);
Route::get("/blog/private/{blog:slug}", [AuthorController::class, "privateView"])->name("privateView");
Route::get("/my-blogs", [AuthorController::class, "myBlogs"])->name("my-blogs")->middleware("can:isAuthor");

//! BlogController accessed only by author here 
Route::get("/write-blog", [BlogController::class, "create"])->name("write-blog")->middleware("can:isAuthor");
Route::post("/write-blog", [BlogController::class, "store"])->middleware("can:isAuthor");
Route::get("/blog/edit/{blog:slug}", [BlogController::class, "edit"])->name("edit-blog")->middleware("can:blogOwner,blog");
Route::put("/blog/edit/{blog:slug}", [BlogController::class, "update"])->middleware("can:blogOwner,blog");
Route::delete("/blog/delete/{blog}", [BlogController::class, "delete"])->middleware("can:blogOwner,blog")->name("delete-blog");

// Route::get("/author", function () {
//     return "You're author";
// })->middleware("can:isAuthor");