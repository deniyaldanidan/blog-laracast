@props(['comment'])

<div class="rounded-xl bg-slate-200 px-6 py-7">
    <div class="flex items-center gap-x-4">
        <img src="https://i.pravatar.cc/100?u={{ $comment->user->username }}
        " alt="{{ $comment->user->name }}"
            class="h-[60px] w-[60px] rounded-full bg-slate-500 object-cover">
        <div class="flex w-full flex-col gap-y-0.5">
            <div class="flex items-center justify-between gap-x-6">
                <h3 class="flex items-center gap-x-2 text-lg font-semibold">
                    <span class="capitalize">{{ $comment->user->name }}</span>
                    <a href="#"
                        class="hover:text-accent underline underline-offset-2 duration-150">{{ '@' . $comment->user->username }}</a>
                </h3>
                @can('delete', $comment)
                    <form action="{{ route('delete-comment', $comment->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="flex w-5">
                            @include('partials.delete-icon')
                        </button>
                    </form>
                @endcan
            </div>
            <div class="text-sm font-semibold text-slate-500">{{ $comment->created_at->diffForHumans() }}</div>
        </div>
    </div>
    <p class="ml-2 mt-3.5 indent-6 first-letter:capitalize">
        {{ $comment->content }}
    </p>
</div>
