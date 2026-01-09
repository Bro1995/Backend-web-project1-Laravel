<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Nieuw nieuwsitem
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">
        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf

            <label class="block mb-1">Titel</label>
            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="w-full border rounded p-2"
                required
                minlength="3"
            >
            @error('title')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror

            <label class="block mt-4 mb-1">Content</label>
            <textarea
                name="content"
                class="w-full border rounded p-2"
                required
                minlength="10"
            >{{ old('content') }}</textarea>
            @error('content')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror

            <label class="block mt-4 mb-1">Afbeelding (optioneel)</label>
            <input
                type="file"
                name="image"
                accept="image/*"
            >
            @error('image')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror

            <button type="submit"
                    class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded">
                Opslaan
            </button>
        </form>
    </div>
</x-app-layout>
