<div class="my-12 flex flex-col items-center justify-center" id="subscribe-section">
    <div class="text-3xl font-bold uppercase text-slate-800">Subscribe to our newsletter.</div>
    <div class="w-[450px]">
        @include('partials.subscribe-svg')
    </div>
    <form class="flex flex-col items-center gap-y-1" action="/newsletter" method="POST">
        @csrf
        <div class="flex items-center justify-center gap-x-0">
            <input type="email" placeholder="youremail@email.com" name="email"
                class="text-background rounded-s-3xl border-none bg-slate-700 px-8 py-3 text-lg outline-none placeholder:text-slate-200">
            <button class="text-background bg-primary rounded-e-3xl border-none px-8 py-3 text-lg"
                type="submit">Subscribe</button>
        </div>
        @error('email')
            <div class="text-sm font-semibold text-red-500 first-letter:capitalize">{{ $message }}</div>
        @enderror
    </form>
</div>
