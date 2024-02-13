<div class="flex flex-col gap-y-2">
    <label for="{{ $id }}" class="text-lg font-semibold capitalize">{{ $label }}</label>
    <input type="{{ $inputType }}" name="{{ $inputName }}" id="{{ $id }}"
        class="rounded-md bg-slate-200 px-2.5 py-1 text-lg outline-none" placeholder="{{ $placeholder }}"
        value="{{ old($inputName) }}">
    @error($inputName)
        <div class="-mt-1 ml-2 text-sm font-semibold text-red-600">{{ $message }}</div>
    @enderror
</div>
