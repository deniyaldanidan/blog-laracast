@php
    $menuClasses = 'text-lg text-slate-900 capitalize hover:text-foreground hover:underline cursor-pointer';
@endphp

<header class="px-space flex items-center justify-between border-b-[2px] border-solid border-slate-400 py-3.5">
    <div class="text-xl font-bold">Blogger</div>
    <div class="flex items-center gap-x-6">
        <a href="/" class="{{ $menuClasses . (request()->routeIs('home') ? ' underline' : '') }}">Home</a>
        <a href="/about" class="{{ $menuClasses . (request()->routeIs('about') ? ' underline' : '') }}">About</a>
        @auth
            <x-user-menu-dropdown />
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="logout" class="{{ $menuClasses }}">
            </form>
        @endauth
        @guest
            <a href="/login" class="{{ $menuClasses . (request()->routeIs('login') ? ' underline' : '') }}">Login</a>
            <a href="/register"
                class="{{ $menuClasses . (request()->routeIs('register') ? ' underline' : '') }}">Register</a>
        @endguest
        <a href="#subscribe-section"
            class="bg-primary text-background hover:bg-accent hover:text-foreground rounded-2xl px-8 py-[7.5px] text-lg font-semibold capitalize duration-100">subscribe</a>
    </div>
</header>
