<x-layout-wrapper :title="$title">
    <x-main-header />
    <main class="px-space min-h-screen py-10">
        {{ $slot }}
    </main>
    @include('partials.subscribe-section')
    <x-main-footer />
</x-layout-wrapper>
