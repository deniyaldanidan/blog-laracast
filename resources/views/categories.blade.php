<x-layout-main title="{{ $category->name }}">

    <h1>Blogs related to {{ $category->name }}</h1>
    <div>

        @foreach ($category->blogs()->with(['author'])->get() as $blog)
            <article>
                {{-- {{ $blogs }} --}}
                <div>{{ $blog->title }}</div>
                <div>{{ $blog->excerpt }}</div>
                by <a href="/blogs/author/{{ $blog->author->username }}"> {{ $blog->author->name }}</a>
                <div>{{ substr($blog->body, 0, 120) }}...</div>
                <a href="/blog/view/{{ $blog->slug }}">View More {{ '>>' }} </a>
            </article>
            <hr>
        @endforeach
    </div>
</x-layout-main>
