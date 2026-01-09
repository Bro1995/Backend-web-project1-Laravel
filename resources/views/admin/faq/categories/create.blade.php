{{-- Admin: create a new FAQ category --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">New FAQ Category</h1>

    <form method="POST" action="{{ route('admin.faq-categories.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Name</label>
            <input name="name" value="{{ old('name') }}"
                   class="w-full border rounded p-2">
            @error('name')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="px-4 py-2 bg-black text-white rounded">
            Save
        </button>
    </form>
</div>
@endsection
