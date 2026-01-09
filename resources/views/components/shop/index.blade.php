<x-layouts.shop :title="'Shop'">
    <div class="grid gap-6 lg:grid-cols-12">
        {{-- Filters --}}
        <aside class="lg:col-span-3">
            <div class="rounded-3xl border border-slate-800 bg-slate-900/30 p-5">
                <h3 class="text-lg font-semibold">Filters</h3>
                <p class="mt-1 text-sm text-slate-400">Find the right gear fast.</p>

                <form method="GET" action="{{ route('shop.index') }}" class="mt-5 space-y-4">
                    <div>
                        <label class="text-sm text-slate-300">Search</label>
                        <input name="q" value="{{ request('q') }}"
                               class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950 px-4 py-3 text-sm outline-none focus:border-blue-500"
                               placeholder="Laptop, Router, SSD..." />
                    </div>

                    <div>
                        <label class="text-sm text-slate-300">Category</label>
                        <select name="category"
                                class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950 px-4 py-3 text-sm outline-none focus:border-blue-500">
                            <option value="">All</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" @selected(request('category') === $cat)>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-sm text-slate-300">Min €</label>
                            <input name="min" value="{{ request('min') }}"
                                   type="number" min="0" step="0.01"
                                   class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950 px-4 py-3 text-sm outline-none focus:border-blue-500" />
                        </div>
                        <div>
                            <label class="text-sm text-slate-300">Max €</label>
                            <input name="max" value="{{ request('max') }}"
                                   type="number" min="0" step="0.01"
                                   class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950 px-4 py-3 text-sm outline-none focus:border-blue-500" />
                        </div>
                    </div>

                    <button class="w-full rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-4 py-3 font-semibold text-slate-950 hover:brightness-110">
                        Apply
                    </button>

                    <a href="{{ route('shop.index') }}" class="block text-center text-sm text-slate-400 hover:text-slate-200">
                        Reset
                    </a>
                </form>
            </div>
        </aside>

        {{-- Products --}}
        <section class="lg:col-span-9">
            <div class="flex items-end justify-between">
                <div>
                    <h1 class="text-2xl font-semibold tracking-tight">IT Equipment</h1>
                    <p class="mt-1 text-sm text-slate-400">Laptops • Networking • Storage • Accessories</p>
                </div>
                <p class="text-sm text-slate-400">
                    Showing {{ $products->count() }} of {{ $products->total() }}
                </p>
            </div>

            <div class="mt-6 grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
                @forelse($products as $p)
                    <article class="group rounded-3xl border border-slate-800 bg-slate-900/20 p-4 hover:bg-slate-900/40">
                        <div class="aspect-[4/3] overflow-hidden rounded-2xl border border-slate-800 bg-slate-950">
                            <img src="{{ $p->image_url ?? asset('images/placeholder.png') }}"
                                 alt="{{ $p->name }}"
                                 class="h-full w-full object-cover opacity-95 group-hover:opacity-100" />
                        </div>

                        <div class="mt-4">
                            <p class="text-xs text-slate-400">{{ $p->brand }} • {{ $p->category }}</p>
                            <h2 class="mt-1 font-semibold">{{ $p->name }}</h2>

                            <div class="mt-3 flex items-center justify-between">
                                <p class="text-lg font-semibold text-cyan-300">€{{ number_format($p->price, 2) }}</p>

                                <button
                                    class="rounded-2xl border border-slate-800 bg-slate-950 px-4 py-2 text-sm hover:border-blue-500 hover:text-cyan-200"
                                    data-add-to-cart
                                    data-id="{{ $p->id }}"
                                    data-name="{{ e($p->name) }}"
                                    data-price="{{ $p->price }}"
                                >
                                    Add
                                </button>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="rounded-3xl border border-slate-800 bg-slate-900/30 p-8 text-slate-300">
                        No products found.
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </section>
    </div>
</x-layouts.shop>
