<x-admin-layout title="Publish Blogs">
    <h1 class="text-center text-2xl font-semibold underline underline-offset-4">
        Publish Blogs
    </h1>
    @if ($blogs->count() >= 1)
        <div class="mt-20 flex flex-wrap items-center justify-center gap-8">
            @foreach ($blogs as $blog)
                <x-blog-card :blogId="$blog->id" :blogTitle="$blog->title" :blogExcerpt="$blog->excerpt"
                    createdAt="{{ $blog->created_at->diffForHumans() }}"
                    updatedAt="{{ $blog->updated_at->diffForHumans() }}" :username="$blog->author->username" :authorName="$blog->author->name"
                    :blogSlug="$blog->slug" :blogBody="$blog->body" categorySlug="{{ $blog->category->slug }}"
                    categoryName="{{ $blog->category->name }}" :blogUrl="route('privateView', ['blog' => $blog->slug])" />
            @endforeach
        </div>
    @else
        <h3 class="mt-12 text-center text-lg font-semibold">No Blogs yet</h3>
    @endif
</x-admin-layout>
