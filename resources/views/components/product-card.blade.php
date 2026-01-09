@props(['product'])

{{-- This card is reused in grids (featured + normal) --}}
<a href="{{ route('products.show', $product->slug) }}" class="card">

    {{-- Product image --}}
    <div class="card-img">
        @if($product->image_path)
            {{-- Use asset('storage/...') if you store images in storage/app/public --}}
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" loading="lazy">
        @else
            <div class="img-fallback">No image</div>
        @endif
    </div>

    {{-- Product text --}}
    <div class="card-body">
        <div class="card-title">{{ $product->name }}</div>

        <div class="card-meta">
            <span>{{ $product->brand ?? 'Generic' }}</span>
            <span class="dot">•</span>
            <span>{{ $product->category ?? 'Other' }}</span>
        </div>

        @if($product->short_description)
            <p class="card-desc">{{ $product->short_description }}</p>
        @endif

        <div class="card-bottom">
            <div class="price">
                € {{ number_format($product->price / 100, 2, ',', '.') }}
            </div>

            <div class="badge {{ $product->stock > 0 ? 'badge-in' : 'badge-out' }}">
                {{ $product->stock > 0 ? 'In stock' : 'Out of stock' }}
            </div>
        </div>
    </div>
</a>
