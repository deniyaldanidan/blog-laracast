<article
    class="flex h-fit w-[650px] flex-col items-center justify-center gap-y-5 rounded-xl border-[1.5px] border-solid border-slate-300">
    <img src="https://picsum.photos/seed/{{ $blogId }}/650/400" alt="{{ $blogTitle }}"
        class="h-auto min-h-[300px] w-full min-w-full rounded-xl rounded-ee-none rounded-es-none bg-slate-500 object-cover">

    <div class="flex h-fit w-full flex-col gap-y-2.5 px-5 pb-5 pt-0">
        <div class="text-lg font-bold">{{ $blogTitle }}</div>
        <div class="flex items-center justify-between text-sm font-bold text-slate-600">
            <div>Created At: {{ $createdAt }}</div>
            <div>Updated At: {{ $updatedAt }}</div>
        </div>
        <div class="flex items-center justify-between text-sm font-bold text-slate-600 underline">
            <a href="{{ route('home') . '?author=' . $username }}" class="hover:text-accent">by
                {{ $authorName }}</a>
            <a href="{{ route('home') . '?category=' . $categorySlug }}" class="hover:text-accent">category:
                {{ $categoryName }}</a>
        </div>
        <div>
            {{ $blogExcerpt }}
            &emsp;
            <a href="{{ route('blog-view', ['blog' => $blogSlug]) }}"
                class="hover:text-accent font-bold text-slate-600 underline">Read
                More
                {{ '>>' }} </a>
        </div>

    </div>
</article>

{{-- blogId, blogTitle, blogExcerpt, createdAt, updatedAt, username, authorName, blogSlug, blogBody, categorySlug, categoryName --}}

{{-- <x-blog-card :blogId="$blog->id" :blogTitle="$blog->title" :blogExcerpt="$blog->excerpt"
    createdAt="{{ $blog->created_at->diffForHumans() }}" updatedAt="{{ $blog->updated_at->diffForHumans() }}"
    :username="$blog->author->username" :authorName="$blog->author->name" :blogSlug="$blog->slug" :blogBody="$blog->body"
    categorySlug="{{ $blog->category->slug }}" categoryName="{{ $blog->category->name }}" /> --}}
