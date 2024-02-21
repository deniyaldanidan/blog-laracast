<x-admin-layout title="Registered Users">
    <div class="px-5">
        <h1 class="text-center text-2xl font-semibold underline underline-offset-4">Registered Users</h1>
        <div class="my-11 flex flex-wrap gap-10">
            @foreach ($users as $user)
                <div class="flex items-center gap-x-4 rounded-md bg-slate-200 px-6 py-2">
                    <img src="https://i.pravatar.cc/75?u={{ $user->username }}" alt="{{ $user->name }}"
                        class="h-[50px] w-[50px] rounded-full object-cover">
                    <div class="flex items-center gap-x-3.5 capitalize">
                        <span class="text-lg font-semibold">
                            {{ $user->name }}
                        </span>
                        @if ($user?->roles)
                            @foreach ($user->roles as $role)
                                <span
                                    class="bg-accent {{ $role === 'admin' ? 'bg-secondary' : '' }} rounded-xl px-3.5 py-1">{{ $role }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-admin-layout>
