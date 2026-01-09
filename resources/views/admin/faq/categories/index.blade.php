{{-- Admin: list all FAQ categories --}}
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">FAQ Categories</h1>

        {{-- Link to create page --}}
        <a href="{{ route('admin.faq-categories.create') }}"
           class="px-4 py-2 bg-black text-white rounded">
            + New Category
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow">
        <table class="w-full">
            <thead>
                <tr class="text-left border-b">
                    <th class="p-3">Name</th>
                    <th class="p-3 w-48">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                    <tr class="border-b">
                        <td class="p-3">{{ $cat->name }}</td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('admin.faq-categories.edit', $cat) }}"
                               class="px-3 py-1 bg-gray-200 rounded">
                                Edit
                            </a>

                            {{-- Delete needs a POST form with method DELETE --}}
                            <form method="POST" action="{{ route('admin.faq-categories.destroy', $cat) }}"
                                  onsubmit="return confirm('Delete this category?');">
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
                        <td class="p-3" colspan="2">No categories yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

