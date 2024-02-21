@php
    $paragraphs = collect(explode("\n", $blog->body));
    $metaClasses = 'flex items-center justify-center gap-x-7 text-base font-bold text-slate-700';
    $metaAnchorClasses = 'hover:text-accent underline underline-offset-[2.5px] duration-100';
@endphp
<x-layout-main :title="$blog->title">
    <div class="mx-auto max-w-[1000px]">
        @can('blogOwner', $blog)
            @php
                $authorActionClasses = 'font-bold text-lg ' . $metaAnchorClasses;
            @endphp
            <div class="flex items-center justify-end gap-x-6">
                <a href="{{ route('edit-blog', $blog->slug) }}" class="{{ $authorActionClasses }}">Edit blog</a>
                <form action="{{ route('delete-blog', $blog->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="{{ $authorActionClasses }}">Delete blog</button>
                </form>
            </div>
        @endcan
        {{-- Title of the blog --}}
        <h1 class="mb-2 text-4xl font-bold">{{ $blog->title }}</h1>
        {{-- Excerpt of the blog --}}
        <h3 class="mb-2.5 text-xl text-slate-700">{{ $blog->excerpt }}</h3>
        {{-- Metas --}}
        <div class="mb-7 flex items-center justify-between">
            <div class="{{ $metaClasses }}">
                <a href="{{ route('home') . '?author=' . $blog->author->username }}" class="{{ $metaAnchorClasses }}">by
                    {{ $blog->author->name }}</a>
                <a href="{{ route('home') . '?category=' . $blog->category->slug }}"
                    class="{{ $metaAnchorClasses }}">Category:
                    {{ $blog->category->name }}</a>
            </div>
            <div class="{{ $metaClasses }}">
                <div>Created At: {{ $blog->created_at->diffForHumans() }}</div>
                <div>Updated At: {{ $blog->created_at->diffForHumans() }}</div>
            </div>
        </div>
        {{-- Poster --}}
        <img src="https://picsum.photos/seed/{{ $blog->id }}/1500/750" alt="{{ $blog->title }}"
            class="min-h-80 h-auto w-full min-w-full rounded-xl bg-slate-300 object-cover">
        {{-- Content --}}
        <div class="my-7 flex flex-col gap-y-4 text-lg">
            {{-- First Para --}}
            <p
                class="text-justify first-letter:float-left first-letter:mr-2.5 first-letter:text-7xl first-letter:font-bold first-line:uppercase first-line:tracking-widest">
                {{ $paragraphs[0] }}
            </p>
            {{-- Remaining Paras --}}
            @foreach ($paragraphs->skip(1) as $para)
                <p class="text-justify indent-5">{{ $para }}</p>
            @endforeach
        </div>
        {{-- Ending Symbols Did it with Asterisk --}}
        <div class="mb-10 flex items-center justify-center gap-x-5 text-5xl font-bold">
            <span>&#x2a;</span>
            <span>&#x2a;</span>
            <span>&#x2a;</span>
        </div>
        @can('isAdmin')
            <form action="/publish-blog" method="post">
                @csrf
                <input type="text" value="{{ $blog->id }}" class="hidden" name="blogId">
                <button
                    class="bg-primary text-background hover:text-foreground mx-auto block h-fit w-fit rounded-lg px-12 py-2.5 text-xl font-semibold duration-150 hover:bg-green-400">Publish
                    Blog</button>
            </form>
        @endcan
    </div>
</x-layout-main>
