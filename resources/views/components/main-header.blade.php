@php
    $menuClasses = 'text-lg text-slate-900 capitalize hover:text-foreground hover:underline';
@endphp

<header class="px-space flex items-center justify-between border-b-[2px] border-solid border-slate-400 py-3.5">
    <div class="text-xl font-bold">Blogger</div>
    <div class="flex items-center gap-x-6">
        <a href="/" class="{{ $menuClasses . (request()->routeIs('home') ? ' underline' : '') }}">Home</a>
        <a href="/" class="{{ $menuClasses . (request()->routeIs('blogs') ? ' underline' : '') }}">Blogs</a>
        <a href="/about" class="{{ $menuClasses . (request()->routeIs('about') ? ' underline' : '') }}">About</a>
        <a href="#"
            class="bg-primary text-background hover:bg-accent hover:text-foreground rounded-2xl px-8 py-[7.5px] text-lg capitalize duration-100">subscribe</a>
    </div>
</header>
