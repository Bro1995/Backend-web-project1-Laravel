<nav class="sticky top-0 z-40 border-b border-slate-800 bg-slate-950/80 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('shop.index') }}" class="group flex items-center gap-3">
            <div class="h-10 w-10 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-400 shadow-lg shadow-blue-600/20"></div>
            <div>
                <p class="text-sm text-slate-400">IT Shop</p>
                <p class="font-semibold tracking-tight group-hover:text-cyan-300">Equipment Store</p>
            </div>
        </a>

        <div class="flex items-center gap-3">
            <a href="{{ route('news.index') }}" class="rounded-xl px-3 py-2 text-sm text-slate-300 hover:bg-slate-900 hover:text-slate-100">
                News
            </a>
            <a href="{{ route('faq.index') }}" class="rounded-xl px-3 py-2 text-sm text-slate-300 hover:bg-slate-900 hover:text-slate-100">
                FAQ
            </a>

            <button id="openCartBtn" class="relative rounded-2xl border border-slate-800 bg-slate-900/40 px-4 py-2 text-sm hover:bg-slate-900">
                Cart
                <span id="cartCount" class="ml-2 inline-flex min-w-6 items-center justify-center rounded-full bg-blue-600 px-2 text-xs font-semibold text-slate-950">0</span>
            </button>
        </div>
    </div>
</nav>
