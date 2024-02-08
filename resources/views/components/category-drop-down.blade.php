@props(['defaultValue'])

<x-dropdown :default="$defaultValue">
    <x-dropdown-link url="/" text="all" />
    @foreach ($categories as $cat)
        <x-dropdown-link :url="'/blogs/category/' . $cat->slug" :text="$cat->name" />
    @endforeach
</x-dropdown>
