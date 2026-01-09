@extends('layouts.app')

@section('content')
<div class="detail-wrap">

    {{-- Back link to home --}}
    <a class="back-link" href="{{ route('home') }}">← Back to products</a>

    <div class="detail-card">

        {{-- Product image --}}
        <div class="detail-image">
            @if($product->image_path)
                <img
                    src="{{ asset('storage/' . $product->image_path) }}"
                    alt="{{ $product->name }}"
                >
            @else
                <div class="image-fallback">No image</div>
            @endif
        </div>

        {{-- Product details --}}
        <div class="detail-info">
            <h1>{{ $product->name }}</h1>

            <div class="detail-meta">
                <span><strong>Brand:</strong> {{ $product->brand ?? 'Generic' }}</span>
                <span><strong>Category:</strong> {{ $product->category ?? 'Other' }}</span>
            </div>

            {{-- Price --}}
            <div class="detail-price">
                € {{ number_format($product->price / 100, 2, ',', '.') }}
            </div>

            {{-- Stock status --}}
            <div class="detail-stock {{ $product->stock > 0 ? 'in' : 'out' }}">
                {{ $product->stock > 0 ? 'In stock' : 'Out of stock' }}
            </div>

            @if($product->short_description)
                <p class="detail-desc">{{ $product->short_description }}</p>
            @endif

            {{-- Demo button (not real orders yet) --}}
            <button class="primary-btn" type="button" disabled title="Demo button">
                Add to cart (demo)
            </button>

            <div class="fine-print">
                Demo shop page for Laravel project. Products come from the database.
            </div>
        </div>
    </div>
</div>
@endsection
