<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Show product list with filters
    public function index(Request $request)
    {
        // Get active products
        $query = Product::query()->where('is_active', true);

        // Search by name or brand
        if ($request->filled('q')) {
            $q = $request->string('q')->toString();

            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('brand', 'like', "%{$q}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->string('category'));
        }

        // Minimum price filter
        if ($request->filled('min')) {
            $query->where('price', '>=', (float) $request->input('min'));
        }

        // Maximum price filter
        if ($request->filled('max')) {
            $query->where('price', '<=', (float) $request->input('max'));
        }

        // Paginate products
        $products = $query->latest()
            ->paginate(12)
            ->withQueryString();

        // Get available categories for filter dropdown
        $categories = Product::query()
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('shop.index', compact('products', 'categories'));
    }
}
