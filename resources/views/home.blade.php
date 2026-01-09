@extends('layouts.shop')

@section('title', 'EHBALPHA - IT Shop')

@section('content')

{{-- Hero section (simple and clean) --}}
<section class="hero">
    <div class="hero-left">
        <h1>IT products that fit your day</h1>
        <p>
            EHBALPHA is a demo webshop for a Laravel project.
            Products are loaded from the database and shown with filters.
        </p>

        {{-- Small filter form (optional extra, search already exists in header) --}}
        <form class="mini-filter" method="GET" action="{{ route('home') }}">
            <select name="category" aria-label="Category">
                <option value="">All categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" @selected(request('category') === $cat)>{{ $cat }}</option>
                @endforeach
            </select>

            <input type="text" name="q" value="{{ request('q') }}" placeholder="Quick search..." aria-label="Quick search">

            <button type="submit">Apply</button>

            @if(request()->filled('q') || request()->filled('category'))
                <a class="link-soft" href="{{ route('home') }}">Reset</a>
            @endif
        </form>
    </div>

    <div class="hero-right">
        <div class="info-box">
            <div class="info-title">Why this homepage scores points</div>
            <ul class="info-list">
                <li>Database-driven products</li>
                <li>Search + category filters</li>
                <li>Reusable Blade component</li>
                <li>Clean layout + responsive</li>
            </ul>
        </div>
    </div>
</section>

{{-- Featured row (only show if we have featured products) --}}
@if(isset($featured) && $featured->count())
    <section class="section">
        <div class="section-head">
            <h2>Featured picks</h2>
            <div class="muted">{{ $featured->count() }} highlighted items</div>
        </div>

        <div class="grid grid-featured">
            @foreach($featured as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>
@endif

{{-- All products --}}
<section class="section">
    <div class="section-head">
        <h2>All products</h2>
        <div class="muted">Total: {{ $products->total() }}</div>
    </div>

    <div class="grid">
        @forelse($products as $product)
            <x-product-card :product="$product" />
        @empty
            <div class="empty">
                No products found. Try another search or category.
            </div>
        @endforelse
    </div>

    <div class="pagination">
        {{ $products->links() }}
    </div>
</section>

@endsection
