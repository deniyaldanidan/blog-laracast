@php
    $paragraphs = collect(explode("\n", $blog->body));
    $metaClasses = 'flex items-center justify-center gap-x-7 text-base font-bold text-slate-700';
    $metaAnchorClasses = 'hover:text-accent underline duration-100';
    $comments = $blog->comments;
@endphp
<x-layout-main :title="$blog->title">
    <div class="mx-auto max-w-[1000px]">
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
        @auth
            <x-comment-form :blogId="$blog->id" />
        @endauth
        @if ($comments->count() >= 1)
            <h2 class="text-xl font-bold uppercase underline underline-offset-[3px]">Comments
                ({{ $comments->count() }})</h2>
            <div class="mt-7 flex flex-col gap-y-7">
                @foreach ($comments as $comment)
                    <x-comment :comment="$comment" />
                @endforeach
            </div>
        @else
            <h2 class="text-center text-xl font-semibold">No comments yet!</h2>
        @endif
    </div>
</x-layout-main>
