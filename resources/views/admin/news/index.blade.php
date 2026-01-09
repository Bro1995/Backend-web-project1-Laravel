{{-- Admin page: list all news --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage News
        </h2>
    </x-slot>

    <div class="p-6 max-w-5xl mx-auto">
        {{-- Success message after create/update/delete --}}
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Button to create new news --}}
        <a href="{{ route('admin.news.create') }}"
           class="inline-block mb-4 px-4 py-2 bg-black text-white rounded">
            Create New News
        </a>

        <div class="bg-white shadow rounded overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b">
                        <th class="p-3">Title</th>
                        <th class="p-3 w-56">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through all news --}}
                    @forelse ($news as $item)
                        <tr class="border-b">
                            <td class="p-3">
                                {{ $item->title }}
                            </td>

                            <td class="p-3 flex gap-2">
                                <a href="{{ route('admin.news.edit', $item) }}"
                                   class="px-3 py-1 bg-gray-200 rounded">
                                    Edit
                                </a>

                                {{-- Delete needs a POST form with method DELETE --}}
                                <form method="POST" action="{{ route('admin.news.destroy', $item) }}"
                                      onsubmit="return confirm('Delete this news item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-3" colspan="2">No news found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $news->links() }}
        </div>
    </div>
</x-app-layout>
