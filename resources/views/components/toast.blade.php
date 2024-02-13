@props(['message', 'status']);

@php
    $toastColorClasses = 'toast fixed bottom-5 right-5 flex items-center justify-center rounded-md px-6 py-3.5 text-lg font-semibold ';
    switch ($status) {
        case 'success':
            $toastColorClasses .= 'bg-green-400 text-foreground';
            break;
        case 'warn':
            $toastColorClasses .= 'bg-orange-400 text-foreground';
            break;
        case 'error':
            $toastColorClasses .= 'bg-red-500 text-foreground';
            break;
    }
@endphp

<div class="{{ $toastColorClasses }}" data-visible="true">
    <span>{{ $message }}</span>
</div>
