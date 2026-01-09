<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $news->title }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">
        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <p class="text-sm text-gray-500">
            Gepubliceerd op {{ optional($news->published_at)->format('d-m-Y H:i') }}
            door {{ $news->author?->name ?? 'Onbekend' }}
        </p>

        @if($news->image)
            <img src="{{ asset('storage/'.$news->image) }}" class="mt-4 max-h-64">
        @endif

        <div class="mt-4 prose">
            {!! nl2br(e($news->content)) !!}
        </div>

        @auth
            @if(auth()->user()->isAdmin())
                <div class="mt-4 flex gap-2">
                    <a href="{{ route('news.edit', $news) }}"
                       class="px-3 py-1 bg-yellow-500 text-white rounded">
                        Bewerken
                    </a>

                    <form method="POST" action="{{ route('news.destroy', $news) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white rounded"
                                onclick="return confirm('Verwijderen?')">
                            Verwijderen
                        </button>
                    </form>
                </div>
            @endif
        @endauth

        {{-- Comments --}}
        <section class="mt-8">
            <h3 class="text-lg font-semibold mb-2">Comments</h3>

            @forelse($news->comments as $comment)
                <div class="border-b py-2">
                    <p class="text-sm text-gray-700">
                        <strong>{{ $comment->user?->name ?? 'Onbekend' }}:</strong>
                        {{ $comment->body }}
                    </p>

                    @auth
                        @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                            <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-xs text-red-600"
                                        onclick="return confirm('Delete comment?')">
                                    Verwijderen
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p>Nog geen comments.</p>
            @endforelse

            @auth
                <form method="POST" action="{{ route('comments.store', $news) }}" class="mt-4">
                    @csrf
                    <label class="block mb-1">Nieuwe comment</label>
                    <textarea name="body" required class="w-full border rounded p-2">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                    <button type="submit"
                            class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded">
                        Plaatsen
                    </button>
                </form>
            @else
                <p class="mt-2 text-sm text-gray-600">
                    Log in om een comment te plaatsen.
                </p>
            @endauth
        </section>
    </div>
</x-app-layout>
