<x-layout-main title="{{ $author->name }}">

    <h1 class="text-center text-2xl font-bold uppercase">Blogs written by {{ $author->name }}</h1>
    <div class="mt-8 flex flex-wrap items-center justify-center gap-8">

        @foreach ($author->blogs()->with(['category'])->get() as $blog)
            <x-blog-card :blogId="$blog->id" :blogTitle="$blog->title" :blogExcerpt="$blog->excerpt"
                createdAt="{{ $blog->created_at->diffForHumans() }}" updatedAt="{{ $blog->updated_at->diffForHumans() }}"
                :username="$author->username" :authorName="$author->name" :blogSlug="$blog->slug" :blogBody="$blog->body"
                categorySlug="{{ $blog->category->slug }}" categoryName="{{ $blog->category->name }}" />
        @endforeach
    </div>
</x-layout-main>
