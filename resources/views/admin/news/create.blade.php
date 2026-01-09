{{-- Admin page: create news --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create News
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">
        {{-- Create form --}}
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            {{-- Title --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input class="mt-1 w-full border rounded p-2" type="text" name="title" value="{{ old('title') }}" required>
                @error('title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Content --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Content</label>
                <textarea class="mt-1 w-full border rounded p-2" name="content" rows="6" required>{{ old('content') }}</textarea>
                @error('content') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Optional image --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Image (optional)</label>
                <input class="mt-1 w-full" type="file" name="image" accept="image/*">
                @error('image') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Save button --}}
            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" type="submit">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
