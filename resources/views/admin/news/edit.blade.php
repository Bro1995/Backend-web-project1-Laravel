{{-- Admin page: edit existing news --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit News
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">
        {{-- Show validation errors --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 rounded">
                <ul class="list-disc ms-5">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Use multipart only if you upload images --}}
        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div>
                <label class="block mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}"
                       class="w-full border rounded p-2">
            </div>

            {{-- Content --}}
            <div>
                <label class="block mb-1">Content</label>
                <textarea name="content" rows="6"
                          class="w-full border rounded p-2">{{ old('content', $news->content) }}</textarea>
            </div>

            {{-- Optional image update --}}
            <div>
                <label class="block mb-1">Replace image (optional)</label>
                <input type="file" name="image" class="w-full">
            </div>

            <button type="submit" class="px-4 py-2 bg-black text-white rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
