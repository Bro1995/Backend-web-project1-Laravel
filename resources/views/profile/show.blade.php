<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Profiel van {{ $user->username ?? $user->name }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">
        @if($user->profile_picture)
            <img src="{{ asset('storage/'.$user->profile_picture) }}" class="h-24 mb-4 rounded-full">
        @endif

        <p><strong>Username:</strong> {{ $user->username }}</p>
        <p><strong>Verjaardag:</strong> {{ optional($user->birthday)->format('d-m-Y') }}</p>
        <p class="mt-2"><strong>Over mij:</strong> {{ $user->about }}</p>
    </div>
</x-app-layout>
