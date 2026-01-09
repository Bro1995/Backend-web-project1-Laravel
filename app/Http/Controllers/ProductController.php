<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Shop home page: list products + search + category filter
     */
    public function home(Request $request)
    {
        $query = Product::query();

        // search
        if ($request->filled('q')) {
            $q = $request->string('q')->toString();

            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('brand', 'like', "%{$q}%")
                    ->orWhere('category', 'like', "%{$q}%");
            });
        }

        // category filter
        if ($request->filled('category')) {
            $query->where('category', $request->string('category')->toString());
        }

        $products = $query
            ->orderByDesc('is_featured')
            ->orderBy('name')
            ->paginate(9)
            ->withQueryString();

        $categories = Product::query()
            ->whereNotNull('category')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('home', compact('products', 'categories'));
        // return view('products.index', compact('products', 'categories'));
    }

    /**
     * Product details page (slug binding)
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }
}
