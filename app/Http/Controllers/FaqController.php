<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;

class FaqController extends Controller
{
    // Show FAQ page with categories and items
    public function index()
    {
        $categories = FaqCategory::with('items')->get();

        return view('faq.index', compact('categories'));
    }
}
