<x-admin-layout title="Author Requests">
    <div class="mx-auto max-w-[750px]">
        <h1 class="text-center text-2xl font-semibold underline underline-offset-4">
            Author Requests
        </h1>
        <div class="my-6 flex flex-col gap-y-5">
            @if ($author_requests->count())
                @foreach ($author_requests as $author_req)
                    <form method="post" class="h-fit w-full rounded-lg bg-slate-200 px-7 py-5">
                        @csrf
                        <div class="flex items-center gap-x-4">
                            <img src="https://i.pravatar.cc/65?u={{ $author_req->user->username }}"
                                alt="{{ $author_req->user->name }}" class="h-[65px] w-[65px] rounded-full object-cover">
                            <div class="flex flex-col gap-y-0.5">
                                <div class="flex items-center gap-x-2 text-lg font-semibold">
                                    <span>{{ $author_req->user->name }}</span><span>{{ '@' . $author_req->user->username }}</span>
                                </div>
                                <div>{{ $author_req->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div class="mb-3 mt-2.5 pl-2 indent-4 text-lg">
                            {{ $author_req->content }}
                        </div>
                        <input type="text" name="authorUsername" value="{{ $author_req->user->username }}"
                            class="hidden">
                        <button type="submit"
                            class="bg-primary text-background hover:text-foreground hover:bg-accent mx-auto block h-fit w-fit rounded-lg px-8 py-2 text-lg font-semibold duration-150">
                            Accept
                        </button>
                    </form>
                @endforeach
            @else
                <h2 class="text-center text-lg font-semibold">No Users are requested to be author, YET!</h2>
            @endif
        </div>
    </div>
</x-admin-layout>

{{-- 
    profile-pic
    name & username
    content
    created_at    
--}}
