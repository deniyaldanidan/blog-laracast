@props(['formName', 'formAction', 'formMethod', 'btnText', 'extras' => ''])

<section class="mx-auto max-w-[750px] rounded-lg border-[2px] border-slate-400 px-7 py-10">
    <h1 class="text-center text-2xl font-bold">{{ $formName }}</h1>
    <form action="{{ $formAction }}" method="{{ $formMethod }}" class="mt-6 flex flex-col gap-y-5">
        @csrf
        {{ $slot }}
        <button type="submit"
            class="bg-primary text-background hover:bg-accent hover:text-foreground mt-2 w-fit self-center rounded-lg px-8 py-2 text-lg font-semibold duration-150">{{ $btnText }}</button>
    </form>
    {{ $extras }}
</section>
