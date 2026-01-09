@extends('layouts.shop')

@section('title', $product->name . ' - EHBALPHA')

@section('content')
    {{-- Simple product page --}}
    <a href="{{ route('home') }}" class="link-soft">← Back</a>

    <div class="section">
        <h1>{{ $product->name }}</h1>

        <p class="muted">
            Brand: {{ $product->brand ?? 'Generic' }} •
            Category: {{ $product->category ?? 'Other' }}
        </p>

        <p><strong>Price:</strong> € {{ number_format($product->price / 100, 2, ',', '.') }}</p>

        <p class="muted">{{ $product->short_description }}</p>
    </div>
@endsection
