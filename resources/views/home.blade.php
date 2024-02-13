<x-layout-main>
    <x-slot:title>
        Home
    </x-slot:title>

    <h1 class="text-center text-2xl font-bold uppercase">Blogger - HomePage</h1>
    <h3 class="mx-auto mb-10 mt-2 max-w-[750px] text-center text-lg">Unlock a treasure trove of knowledge on our vibrant
        Blogs Website. Immerse yourself in diverse topics, from cutting-edge tech to life-enhancing hacks. Stay
        informed, stay inspired with our thoughtfully curated content. Join our community and embark on a journey where
        every click brings you closer to discovery and enlightenment.
    </h3>
    <div class="flex items-center justify-center gap-x-9">
        <x-category-drop-down />
        <x-author-drop-down />
        <x-search-bar />
        <a href="/"
            class="bg-secondary hover:bg-accent rounded-xl px-8 py-2 text-lg font-semibold duration-150">Reset all</a>
    </div>
    @if ($blogs->count() >= 1)
        <div class="mt-20 flex flex-wrap items-center justify-center gap-8">
            @foreach ($blogs as $blog)
                <x-blog-card :blogId="$blog->id" :blogTitle="$blog->title" :blogExcerpt="$blog->excerpt"
                    createdAt="{{ $blog->created_at->diffForHumans() }}"
                    updatedAt="{{ $blog->updated_at->diffForHumans() }}" :username="$blog->author->username" :authorName="$blog->author->name"
                    :blogSlug="$blog->slug" :blogBody="$blog->body" categorySlug="{{ $blog->category->slug }}"
                    categoryName="{{ $blog->category->name }}" />
            @endforeach
        </div>
        <x-pagination :currentPage="$blogs->currentPage()" :lastPage="$blogs->lastPage()" />
    @else
        <div class="mt-24 text-center text-xl font-bold uppercase">Sorry, No blogs found.</div>
    @endif
    <script src="/js/dropdown-script.js"></script>

</x-layout-main>
