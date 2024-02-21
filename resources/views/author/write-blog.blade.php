<x-layout-main title="Write Blog">
    <x-form formName="Write Blog" formAction="" formMethod="POST" btnText="Submit">
        <x-input-group id="title" label="blog Title" inputType="text" inputName="title"
            placeholder="Enter your blog title here" />
        <x-input-group id="excerpt" label="blog excerpt" inputType="text" inputName="excerpt"
            placeholder="Enter your blog excerpt here" />
        <x-input-group id="body" label="blog body" inputType="text" inputName="body"
            placeholder="Enter your blog content here" :textArea="true" />
        <div class="flex flex-col gap-0.5">
            <select name="category" required
                class="rounded-md border-[1.5px] border-slate-400 bg-slate-100 p-2 text-lg font-semibold outline-none duration-150 focus:border-slate-700 focus:bg-slate-200">
                <option disabled selected hidden>Select category</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="ml-2 text-sm font-semibold text-red-600">{{ $message }}</div>
            @enderror
        </div>
    </x-form>
</x-layout-main>
