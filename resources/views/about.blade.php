<x-layout-main>
    <x-slot:title>
        About
    </x-slot:title>

    <h1>Apple is good</h1>
    <h2>{{ $info }}</h2>
    @isAdmin
        <h2>Hello, Admin</h2>
    @endisAdmin

    @isAuthor
        <h2>Hello, Author</h2>
    @endisAuthor
</x-layout-main>
