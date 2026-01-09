<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Page title can be changed per page --}}
    <title>@yield('title', 'EHBALPHA - Online IT Shop')</title>

    {{-- Vite includes CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page">

    {{-- Top header (sticky) --}}
    <header class="header">
        <div class="container header-row">

            {{-- Logo + brand --}}
            <a href="{{ route('home') }}" class="brand">
                {{-- Put your logo in public/images/logo-ehbalpha.png --}}
                <img src="{{ asset('images/logo-ehbalpha.png') }}" alt="EHBALPHA logo" class="brand-logo">
                <div class="brand-text">
                    <div class="brand-name">ehbalpha</div>
                    <div class="brand-tagline">IT products • simple shopping</div>
                </div>
            </a>

            {{-- Search --}}
            <form class="search" method="GET" action="{{ route('home') }}">
                {{-- Keep category filter if user selected one --}}
                @if(request()->filled('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input
                    class="search-input"
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Search laptops, routers, SSD..."
                    aria-label="Search"
                >
                <button class="search-btn" type="submit">Search</button>
            </form>

            {{-- Right actions --}}
            <nav class="nav">
                @auth
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="nav-link" href="{{ route('profile.edit') }}">My profile</a>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link nav-cta" href="{{ route('register') }}">Register</a>
                @endauth
            </nav>
        </div>

        {{-- Category bar --}}
        <div class="container cat-row">
            <a class="chip {{ request('category') ? '' : 'chip-active' }}" href="{{ route('home') }}">All</a>

            {{-- Categories come from DB (pass $categories from controller) --}}
            @isset($categories)
                @foreach($categories as $cat)
                    <a
                        class="chip {{ request('category') === $cat ? 'chip-active' : '' }}"
                        href="{{ route('home', ['category' => $cat, 'q' => request('q')]) }}"
                    >
                        {{ $cat }}
                    </a>
                @endforeach
            @endisset
        </div>
    </header>

    <main class="container main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer-row">
            <div>© {{ date('Y') }} EHBALPHA</div>
            <div class="footer-links">
                <a href="{{ route('faq.index') }}">FAQ</a>
                <a href="{{ route('news.index') }}">News</a>
                <a href="{{ route('contact.show') }}">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>
