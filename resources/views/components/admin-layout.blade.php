@php
    $anchorClasses = 'text-lg hover:underline hover:underline-offset-4 capitalize';
@endphp

<x-layout-wrapper :title="$title">
    <header class="px-space flex items-center justify-between border-b-2 border-b-slate-400 py-2.5">
        <div class="text-xl font-semibold">Admin Dashboard</div>
        <div class="flex items-center gap-x-7">
            <a href="/admin" class="{{ $anchorClasses }}">Registered Users</a>
            <a href="/author-requests" class="{{ $anchorClasses }}">Author Requests</a>
            <a href="/publish-blogs" class="{{ $anchorClasses }}">Publish Blogs</a>
        </div>
        <a href="/"
            class="bg-primary text-background hover:bg-accent hover:text-foreground rounded-md px-9 py-2 text-lg font-semibold duration-150">Exit</a>
    </header>
    <main class="px-space py-10">
        {{ $slot }}
    </main>
</x-layout-wrapper>
