@extends('layouts.shop')

@section('title', 'Contact - EHBALPHA')

@section('content')
<div class="section">
    <h1>Contact</h1>

    {{-- Show success message after sending --}}
    @if(session('success'))
        <p class="muted">{{ session('success') }}</p>
    @endif

    {{-- IMPORTANT:
         method must be POST
         action must go to contact.send
         @csrf is required for security --}}
    <form method="POST" action="{{ route('contact.send') }}" class="contact-form">
        @csrf

        {{-- Name --}}
        <label for="name">Name</label>
        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >
        @error('name')
            <p class="muted">{{ $message }}</p>
        @enderror

        {{-- Email --}}
        <label for="email">Email</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >
        @error('email')
            <p class="muted">{{ $message }}</p>
        @enderror

        {{-- Subject --}}
        <label for="subject">Subject</label>
        <input
            id="subject"
            type="text"
            name="subject"
            value="{{ old('subject') }}"
            required
        >
        @error('subject')
            <p class="muted">{{ $message }}</p>
        @enderror

        {{-- Message --}}
        <label for="message">Message</label>
        <textarea
            id="message"
            name="message"
            rows="6"
            required
        >{{ old('message') }}</textarea>
        @error('message')
            <p class="muted">{{ $message }}</p>
        @enderror

        {{-- Submit button (NO disabled attribute) --}}
        <button type="submit" class="search-btn">
            Send message
        </button>
    </form>
</div>
@endsection
