<div class="mb-16">
    <h2 class="mb-7 text-xl font-bold capitalize underline underline-offset-[3px]">Add Comment</h2>
    <form action="{{ route('create-comment') }}" method="POST" class="flex flex-col gap-y-3">
        @csrf
        <input type="number" name="blogid" value="{{ $blogId }}" class="hidden">
        <textarea name="content" cols="30" rows="10"
            class="min-h-28 w-full rounded-md border-[1.5px] border-slate-400 bg-slate-100 px-2.5 py-3.5 text-lg outline-none duration-200 focus:border-slate-700 focus:bg-slate-200">{{ old('content') }}</textarea>
        @error('content')
            <div class="-mt-2 ml-2 text-sm font-semibold text-red-600">{{ $message }}</div>
        @enderror
        <button type="submit"
            class="bg-primary text-background hover:bg-accent hover:text-foreground ml-auto flex h-fit w-fit items-center justify-center rounded-lg px-7 py-2 text-lg font-semibold duration-150">Comment</button>
    </form>
</div>
