<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, "index"])->name("home");

Route::get("/blog/view/{blog:slug}", [BlogController::class, "view"])->name("blog-view");

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

Route::get("/admin", [AdminController::class, "index"])->middleware("can:isAdmin")->name("admin-dashboard");

Route::get("/author", function () {
    return "You're author";
})->middleware("can:isAuthor");