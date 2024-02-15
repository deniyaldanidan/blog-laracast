{{-- Everything comes from Component Class Don't send anything when including --}}
<x-dropdown :default="$default" droplabel="Category">
    <x-dropdown-link :url="mergeQuery([], ['page', 'category'])" text="All" />
    @foreach ($categories as $cat)
        <x-dropdown-link :url="mergeQuery(['category' => $cat->slug], ['page'])" :text="$cat->name" />
    @endforeach
</x-dropdown>
