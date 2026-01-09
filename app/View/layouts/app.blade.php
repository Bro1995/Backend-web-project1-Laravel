<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Page title -->
    <title>TechStore</title>

    <!-- Main CSS file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- Main navigation bar -->
<nav class="navbar">
    <div class="logo">TechStore</div>

    <!-- Navigation links -->
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/products">Products</a></li>
        <li><a href="/news">News</a></li>
        <li><a href="/faq">FAQ</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
</nav>

<!-- Main page content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer>
    <p>© 2025 TechStore</p>
</footer>

<!-- Main JavaScript file -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
