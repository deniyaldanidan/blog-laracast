<x-layout-main>
    <x-slot:title>
        Home
    </x-slot:title>

    <h1>Blogs - Home</h1>
    <div>

        @foreach ($blogs as $blog)
            <article>
                <div>{{ $blog->title }}</div>
                <div>{{ $blog->excerpt }}</div>
                <a href="/blogs/author/{{ $blog->author->username }}">by {{ $blog->author->name }}</a>
                <br>
                <a href="/blogs/category/{{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                <div>Updated At {{ $blog->updated_at->toDayDateTimeString() }}</div>
                <div>Created At {{ $blog->created_at->toDayDateTimeString() }}</div>
                <div>{{ substr($blog->body, 0, 120) }}...</div>
                <a href="/blog/view/{{ $blog->slug }}">View More {{ '>>' }} </a>
            </article>
            <hr>
        @endforeach
    </div>
</x-layout-main>
