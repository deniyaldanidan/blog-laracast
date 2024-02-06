<x-layout-main title="{{ $author->name }}">

    <h1>Blogs written by {{ $author->name }}</h1>
    <div>

        @foreach ($author->blogs()->with(['category'])->get() as $blog)
            <article>
                {{-- {{ $blogs }} --}}
                <div>{{ $blog->title }}</div>
                <div>{{ $blog->excerpt }}</div>
                on <a href="/blogs/category/{{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                <div>{{ substr($blog->body, 0, 120) }}...</div>
                <a href="/blog/view/{{ $blog->slug }}">View More {{ '>>' }} </a>
            </article>
            <hr>
        @endforeach
    </div>
</x-layout-main>
