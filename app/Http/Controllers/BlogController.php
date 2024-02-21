<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function create()
    {
        return view("author.write-blog", [
            "categories" => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:298|min:3",
            "excerpt" => "required|max:500|min:3",
            "body" => "required|min:500|max:9000",
            "category" => "required|exists:categories,id"
        ]);


        $slug = Str::of($request->input('title'))->trim()->slug('-') . rand(2000, 5000);

        $request->user()->blogs()->create([
            "title" => $request->input("title"),
            "slug" => $slug,
            "excerpt" => $request->input("excerpt"),
            "body" => $request->input("body"),
            "category_id" => $request->input("category")
        ]);

        return redirect()->route("my-blogs")->with("success", "Blog has been created");
    }

    public function edit(Blog $blog)
    {
        return view("author.edit-blog", [
            "blog" => $blog,
            "categories" => Category::all()
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            "title" => "required|max:298|min:3",
            "excerpt" => "required|max:500|min:3",
            "body" => "required|min:500|max:9000",
            "category" => "required|exists:categories,id"
        ]);

        $slug = Str::of($request->input('title'))->trim()->slug('-') . rand(2000, 5000);

        $blog->title = $request->input("title");
        $blog->slug = $slug;
        $blog->body = $request->input("body");
        $blog->category_id = $request->input("category");
        $blog->excerpt = $request->input("excerpt");
        $blog->save();

        return redirect()->route("privateView", ["blog" => $blog->slug])->with("success", "Blog is updated");
    }

    public function delete(Request $request, Blog $blog)
    {
        $blog->delete();
        return redirect()->route("my-blogs")->with("success", "Blog is deleted");
    }
}
