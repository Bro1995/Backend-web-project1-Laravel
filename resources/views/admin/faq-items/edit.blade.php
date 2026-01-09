{{-- Admin page: edit FAQ item --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit FAQ Item
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('admin.faq-items.update', $item) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select class="mt-1 w-full border rounded p-2" name="faq_category_id" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('faq_category_id', $item->faq_category_id) == $cat->id)>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('faq_category_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Question</label>
                <input class="mt-1 w-full border rounded p-2"
                       type="text" name="question" value="{{ old('question', $item->question) }}" required>
                @error('question')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Answer</label>
                <textarea class="mt-1 w-full border rounded p-2"
                          name="answer" rows="6" required>{{ old('answer', $item->answer) }}</textarea>
                @error('answer')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" type="submit">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
