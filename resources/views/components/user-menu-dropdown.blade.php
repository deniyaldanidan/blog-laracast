@php
    $dropAnchorClasses = 'capitalize text-base px-2.5 py-2 hover:bg-secondary first-of-type:rounded-ss-md first-of-type:rounded-se-md duration-150 last-of-type:rounded-ee-md last-of-type:rounded-es-md';
@endphp

<div class="relative">
    <button class="cursor-pointer text-lg capitalize text-slate-900" onclick="openDrop(this)">Hi,
        {{ auth()->user()->name }}
    </button>
    <div class="absolute top-full h-fit w-full flex-col gap-y-1 rounded-md bg-slate-200 data-[state=open]:flex data-[state=close]:hidden data-[state=close]:translate-y-0 data-[state=open]:translate-y-1"
        data-state="close">
        @cannot('isAuthor')
            <a href="{{ route('be-author') }}" class="{{ $dropAnchorClasses }}">Be Author</a>
        @endcannot
        @can('isAuthor')
            <a href="{{ route('write-blog') }}" class="{{ $dropAnchorClasses }}">Write blog</a>
            <a href="{{ route('my-blogs') }}" class="{{ $dropAnchorClasses }}">My blogs</a>
        @endcan
        @can('isAdmin')
            <a href="{{ route('admin-dashboard') }}" class="{{ $dropAnchorClasses }}">admin dashboard</a>
        @endcan
    </div>
</div>

<script>
    function openDrop(el) {
        const dropdownBar = el.parentElement.lastElementChild;
        if (dropdownBar.dataset?.state === "close") {
            dropdownBar.dataset.state = "open";
        } else {
            dropdownBar.dataset.state = "close";
        }
    }
</script>
