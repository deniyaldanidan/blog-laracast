<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, "index"])->name("home");

Route::get("/blog/view/{blog:slug}", [BlogController::class, "view"])->name("blog-view");

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