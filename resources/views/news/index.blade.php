<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Nieuws
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6">
        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('news.create') }}"
                   class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white rounded">
                    Nieuw nieuwsitem
                </a>
            @endif
        @endauth

        @forelse($news as $item)
            <article class="mb-6 border rounded p-4 bg-white">
                <h3 class="text-xl font-bold">
                    <a href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
                </h3>

                <p class="text-sm text-gray-500">
                    Gepubliceerd op {{ optional($item->published_at)->format('d-m-Y H:i') }}
                    door {{ $item->author?->name ?? 'Onbekend' }}
                </p>

                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" class="mt-2 max-h-48">
                @endif

                <p class="mt-2">
                    {{ \Illuminate\Support\Str::limit($item->content, 200) }}
                </p>

                <a href="{{ route('news.show', $item) }}" class="text-indigo-600">
                    Lees meer
                </a>
            </article>
        @empty
            <p>Er zijn nog geen nieuwsitems.</p>
        @endforelse

        {{ $news->links() }}
    </div>
</x-app-layout>
