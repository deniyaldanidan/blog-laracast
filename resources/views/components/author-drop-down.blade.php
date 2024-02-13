{{-- Everything comes from Component Class Don't send anything when including --}}
<x-dropdown :default="$default" droplabel="Author">
    <x-dropdown-link :url="mergeQuery([], ['page', 'author'])" text="All" />
    @foreach ($authors as $author)
        <x-dropdown-link :url="mergeQuery(['author' => $author->username], ['page'])" :text="$author->name" />
    @endforeach
</x-dropdown>
