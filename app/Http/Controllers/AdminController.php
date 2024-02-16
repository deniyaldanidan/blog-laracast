<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // show list of users as the default page
        // build a layout to view author-requests, publish-blog-requests
        // have a exit button to go back to HomePage.
        return view("admin.index");
    }
}
