{{-- Admin: create a new FAQ item --}}
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">New FAQ Item</h1>

    <form method="POST" action="{{ route('admin.faq-items.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Category</label>
            <select name="faq_category_id" class="w-full border rounded p-2">
                <option value="">-- Select --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(old('faq_category_id') == $cat->id)>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('faq_category_id')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-1">Question</label>
            <input name="question" value="{{ old('question') }}"
                   class="w-full border rounded p-2">
            @error('question')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-1">Answer</label>
            <textarea name="answer" rows="5"
                      class="w-full border rounded p-2">{{ old('answer') }}</textarea>
            @error('answer')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="px-4 py-2 bg-black text-white rounded">
            Save
        </button>
    </form>
</div>
@endsection
