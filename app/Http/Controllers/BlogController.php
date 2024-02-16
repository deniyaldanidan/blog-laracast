<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        return view('home', [
            "blogs" => Blog::whereNotNull("published_at")->latest("published_at")->with(["category", "author"])->filter(request()->only('search', 'category', 'author'))->paginate(8)
        ]);
    }

    public function view(Blog $blog)
    {
        return view("view-blog", [
            "blog" => $blog
        ]);
    }
}
