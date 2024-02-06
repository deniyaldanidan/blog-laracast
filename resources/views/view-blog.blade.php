<x-layout-main title="{{ $blog->title }}">
    <h1>{{ $blog->title }}</h1>
    <h3>{{ $blog->excerpt }}</h3>
    <a href="/blogs/author/{{ $blog->author->username }}">by {{ $blog->author->name }}</a>
    <br>
    <a href="/blogs/category/{{ $blog->category->slug }}">{{ $blog->category->name }}</a>
    <p>{{ $blog->body }}</p>
</x-layout-main>
