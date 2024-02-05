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
                <div>{{ substr($blog->body, 0, 120) }}...</div>
                <a href="/blog/view/{{ $blog->slug }}">View More {{ '>>' }} </a>
            </article>
        @endforeach
    </div>
</x-layout-main>
