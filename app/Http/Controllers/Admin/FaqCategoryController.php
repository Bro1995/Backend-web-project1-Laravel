<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    // Show all FAQ categories
    public function index()
    {
          // Get all categories from DB
        $categories = \App\Models\FaqCategory::orderBy('name')->get();

        return view('admin.faq.categories.index', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        return view('admin.faq.categories.create');
    }

    // Store a new FAQ category
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2'],
        ]);

        FaqCategory::create($data);

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'Categorie aangemaakt.');
    }

    // Show form to edit a category
    public function edit(FaqCategory $faq_category)
    {
        return view('admin.faq.categories.edit', [
            'category' => $faq_category,
        ]);
    }

    // Update an existing category
    public function update(Request $request, FaqCategory $faq_category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2'],
        ]);

        $faq_category->update($data);

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'Categorie bijgewerkt.');
    }

    // Delete a category
    public function destroy(FaqCategory $faq_category)
    {
        $faq_category->delete();

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'Categorie verwijderd.');
    }
}
