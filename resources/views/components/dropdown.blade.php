<div class="relative w-fit min-w-[320px] max-w-[450px]" id="category-btn" data-state="closed">
    <div
        class="flex w-full cursor-pointer items-center justify-between gap-x-6 rounded-lg border-[2.5px] bg-slate-300 px-4 py-2 text-base">
        <span>
            <strong>
                Category:
            </strong>
            {{ $default }}
        </span>
        <span {{-- active = rotate-[135deg] translate-y-1  --}} {{-- -rotate-[45deg] -translate-x-0.5 --}}
            class="content-[' '] border-foreground block h-2 w-2 -translate-x-0.5 -rotate-45 border-2 border-r-transparent border-t-transparent duration-300"
            id="category-btn-icon"></span>
    </div>
    <div id="category-dropdown"
        class="scrollbar-styled absolute left-1/2 top-full z-10 hidden h-fit max-h-64 w-11/12 -translate-x-1/2 translate-y-1 flex-col gap-y-1 overflow-y-auto overflow-x-hidden rounded-lg bg-slate-200">

        {{ $slot }}
    </div>
</div>


@include('partials.dropdown-script')
