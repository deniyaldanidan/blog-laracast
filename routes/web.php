<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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