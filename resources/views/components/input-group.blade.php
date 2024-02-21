@props(['id', 'label', 'inputType', 'inputName', 'placeholder', 'textArea' => false, 'value' => ''])

@php
    $commonInputClasses = 'w-full rounded-md border-[1.5px] border-slate-400 bg-slate-100 px-2.5 py-1.5 text-lg outline-none duration-200 focus:border-slate-700 focus:bg-slate-200';
@endphp

<div class="flex flex-col gap-y-2">
    <label for="{{ $id }}" class="text-lg font-semibold capitalize">{{ $label }}</label>
    @if ($textArea)
        <textarea name="{{ $inputName }}" class="{{ $commonInputClasses . ' min-h-28 h-56' }}" id="{{ $id }}"
            cols="30" rows="10">{{ old($inputName) ?? $value }}</textarea>
    @else
        <input type="{{ $inputType }}" name="{{ $inputName }}" id="{{ $id }}"
            class="{{ $commonInputClasses }}" placeholder="{{ $placeholder }}"
            value="{{ old($inputName) ?? $value }}">
    @endif
    @error($inputName)
        <div class="-mt-1 ml-2 text-sm font-semibold text-red-600">{{ $message }}</div>
    @enderror
</div>
