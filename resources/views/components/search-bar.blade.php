<form action="#" method="GET" class="flex items-center justify-center gap-x-0">
    <input type="text" value="{{ request('search') }}"
        class="text-foreground flex h-12 w-[300px] items-center rounded-lg rounded-ee-none rounded-se-none border-[2.5px] border-r-0 border-slate-200 bg-slate-300 px-4 py-2 text-lg outline-none"
        name="search" placeholder="search here">
    <button type="submit"
        class="hover:text-primary flex h-12 items-center rounded-lg rounded-es-none rounded-ss-none border-[2.5px] border-l-0 border-slate-200 bg-slate-300 px-4 py-2 text-lg duration-100">
        <svg class="feather feather-search" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
            xmlns="http://www.w3.org/2000/svg">
            <circle cx="11" cy="11" r="8" />
            <line x1="21" x2="16.65" y1="21" y2="16.65" />
        </svg>
    </button>
</form>
