<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    // Show all FAQ items
    public function index()
    {
        $items = FaqItem::with('category')->get();

        return view('admin.faq.items.index', compact('items'));
    }

    // Show form to create a new FAQ item
    public function create()
    {
        $categories = FaqCategory::all();

        return view('admin.faq.items.create', compact('categories'));
    }

    // Store a new FAQ item
    public function store(Request $request)
    {
        $data = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question'        => ['required', 'string', 'min:3'],
            'answer'          => ['required', 'string', 'min:3'],
        ]);

        FaqItem::create($data);

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ vraag aangemaakt.');
    }

    // Show form to edit an FAQ item
    public function edit(FaqItem $faq_item)
    {
        $categories = FaqCategory::all();

        return view('admin.faq.items.edit', [
            'item'       => $faq_item,
            'categories' => $categories,
        ]);
    }

    // Update an existing FAQ item
    public function update(Request $request, FaqItem $faq_item)
    {
        $data = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question'        => ['required', 'string', 'min:3'],
            'answer'          => ['required', 'string', 'min:3'],
        ]);

        $faq_item->update($data);

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ vraag bijgewerkt.');
    }

    // Delete an FAQ item
    public function destroy(FaqItem $faq_item)
    {
        $faq_item->delete();

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ vraag verwijderd.');
    }
}
