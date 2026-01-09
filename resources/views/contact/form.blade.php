{{-- Public contact form page --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact
        </h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto">
        {{-- Show success message after sending --}}
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Contact form --}}
        <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input class="mt-1 w-full border rounded p-2"
                       type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input class="mt-1 w-full border rounded p-2"
                       type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Subject --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Subject</label>
                <input class="mt-1 w-full border rounded p-2"
                       type="text" name="subject" value="{{ old('subject') }}" required>
                @error('subject')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Message --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Message</label>
                <textarea class="mt-1 w-full border rounded p-2"
                          name="message" rows="6" required>{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit button --}}
            <div>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Send
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
