{{-- Public FAQ page (read-only) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ
        </h2>
    </x-slot>

    <div class="p-6 max-w-4xl mx-auto space-y-6">
        {{-- Loop categories with their items --}}
        @forelse($categories as $category)
            <div class="border rounded p-4 bg-white">
                <h3 class="text-lg font-semibold mb-3">
                    {{ $category->name }}
                </h3>

                {{-- Questions inside the category --}}
                <div class="space-y-3">
                    @forelse($category->items as $item)
                        <div class="border rounded p-3 bg-gray-50">
                            <p class="font-medium">{{ $item->question }}</p>
                            <p class="text-sm text-gray-700 mt-1">{{ $item->answer }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No questions yet.</p>
                    @endforelse
                </div>
            </div>
        @empty
            <p class="text-gray-500">No FAQ categories found.</p>
        @endforelse
    </div>
</x-app-layout>
