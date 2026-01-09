@extends('layouts.app')

@section('content')

<!-- Page title -->
<h1 class="page-title">Our Products</h1>

<!-- Products list container -->
<div class="products-container">

    <!-- Single product card -->
    <div class="product-card">
        <img src="{{ asset('images/keyboard.jpg') }}" alt="Keyboard">
        <h3>Gaming Keyboard</h3>
        <p class="price">€59.99</p>
        <button onclick="addToCart('Gaming Keyboard')">Add to Cart</button>
    </div>

    <!-- Single product card -->
    <div class="product-card">
        <img src="{{ asset('images/mouse.jpg') }}" alt="Mouse">
        <h3>Gaming Mouse</h3>
        <p class="price">€39.99</p>
        <button onclick="addToCart('Gaming Mouse')">Add to Cart</button>
    </div>

    <!-- Single product card -->
    <div class="product-card">
        <img src="{{ asset('images/headset.jpg') }}" alt="Headset">
        <h3>Gaming Headset</h3>
        <p class="price">€79.99</p>
        <button onclick="addToCart('Gaming Headset')">Add to Cart</button>
    </div>

</div>

@endsection
