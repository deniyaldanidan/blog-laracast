<x-layout-main title="{{ $category->name }}">

    <h1 class="mb-10 text-center text-2xl font-bold uppercase">Blogs related to {{ $category->name }}</h1>
    <div class="flex items-center justify-center gap-x-9">
        <x-category-drop-down :defaultValue="$category->name" />
    </div>
    <div class="mt-20 flex flex-wrap items-center justify-center gap-8">
        @foreach ($category->blogs->load(['author']) as $blog)
            <x-blog-card :blogId="$blog->id" :blogTitle="$blog->title" :blogExcerpt="$blog->excerpt"
                createdAt="{{ $blog->created_at->diffForHumans() }}" updatedAt="{{ $blog->updated_at->diffForHumans() }}"
                :username="$blog->author->username" :authorName="$blog->author->name" :blogSlug="$blog->slug" :blogBody="$blog->body"
                categorySlug="{{ $category->slug }}" categoryName="{{ $category->name }}" />
        @endforeach
    </div>
</x-layout-main>
