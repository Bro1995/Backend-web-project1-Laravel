@props(['image' => null, 'name', 'price'])

<!-- Single product card -->
<div class="product-card">

    <!-- Product image -->
    <img src="{{ asset('images/' . $image) }}">

    <!-- Product name -->
    <h3>{{ $name }}</h3>

    <!-- Product price -->
    <p class="price">€{{ $price }}</p>

    <!-- Add product to cart -->
    <button onclick="addToCart('{{ $name }}')">
        Add to Cart
    </button>

</div>
