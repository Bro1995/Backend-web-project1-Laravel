{{-- Admin: list all FAQ items (question + answer) --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">FAQ Items</h1>

        <a href="{{ route('admin.faq-items.create') }}"
           class="px-4 py-2 bg-black text-white rounded">
            + New Item
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left border-b">
                    <th class="p-3">Category</th>
                    <th class="p-3">Question</th>
                    <th class="p-3 w-48">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr class="border-b">
                        <td class="p-3">{{ $item->category?->name }}</td>
                        <td class="p-3">{{ $item->question }}</td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('admin.faq-items.edit', $item) }}"
                               class="px-3 py-1 bg-gray-200 rounded">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.faq-items.destroy', $item) }}"
                                  onsubmit="return confirm('Delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 text-white rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-3" colspan="3">No items yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

