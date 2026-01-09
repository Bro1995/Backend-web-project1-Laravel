{{--
    Products index page
    This page shows a list of all products
    Data comes from the database (ProductController@index)
--}}

@extends('layouts.app')

@section('content')

    <h1>Our IT Products</h1>

    {{-- Check if there are products --}}
    @if ($products->count())

        {{-- Products grid --}}
        <div class="products-grid">

            {{-- Loop through all products --}}
            @foreach ($products as $product)

                {{-- Use the reusable product card component --}}
                <x-product-card :product="$product" />

            @endforeach

        </div>

        {{-- Pagination links --}}
        <div class="pagination">
            {{ $products->links() }}
        </div>

    @else
        {{-- Message if no products exist --}}
        <p>No products available at the moment.</p>
    @endif

@endsection
