<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the homepage shop.
     * This page loads products from database and supports filters.
     */
    public function index(Request $request)
    {
        // Start a query for products
        $query = Product::query();

        // Search filter (q)
        if ($request->filled('q')) {
            $q = $request->string('q')->toString();

            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('brand', 'like', "%{$q}%")
                    ->orWhere('category', 'like', "%{$q}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->string('category')->toString());
        }

        // Products list with pagination
        $products = $query
            ->orderByDesc('is_featured')
            ->orderByDesc('created_at')
            ->paginate(9)
            ->withQueryString();

        // Categories list for chips/dropdown
        $categories = Product::query()
            ->whereNotNull('category')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('home', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
