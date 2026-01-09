<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    {{-- Basic responsive meta --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Main app CSS (Vite or compiled assets) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- Admin header --}}
    <header>
        <nav>
            <h1>Admin Panel</h1>

            {{-- Admin navigation links --}}
            <ul>
                <li><a href="/admin">Dashboard</a></li>
                <li><a href="/admin/products">Products</a></li>
                <li><a href="/admin/news">News</a></li>
                <li><a href="/admin/users">Users</a></li>
                <li><a href="/admin/faq-categories">FAQ</a></li>
                <li><a href="/admin/contacts">Contacts</a></li>
            </ul>

            {{-- Logout form (POST for security) --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    </header>

    {{-- Flash messages (success / error) --}}
    <x-alert />

    {{-- Main admin content --}}
    <main>
        {{-- This is where child views will be injected --}}
        @yield('content')
    </main>

    {{-- Simple footer --}}
    <footer>
        <p>Admin Panel - Laravel Project</p>
    </footer>

</body>
</html>
