@props(['currentPage', 'lastPage'])

@php
    $anchorClasses = 'bg-primary text-background px-9 py-3 rounded-xl font-semibold text-lg capitalize duration-150 hover:bg-accent hover:text-foreground';
@endphp

<div class="mt-14 flex items-center justify-center gap-x-10">
    @if ($currentPage > 1)
        <a href="/{{ mergeQuery(['page' => $currentPage - 1]) }}" class="{{ $anchorClasses }}">Previous Page</a>
    @endif
    <p class="text-lg font-bold">
        Page {{ $currentPage }} out of {{ $lastPage }}
    </p>
    @if ($currentPage < $lastPage)
        <a href="/{{ mergeQuery(['page' => $currentPage + 1]) }}" class="{{ $anchorClasses }}">Next Page</a>
    @endif
</div>
