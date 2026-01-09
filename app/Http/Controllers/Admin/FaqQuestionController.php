<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    // Show all FAQ questions with their categories
    public function index()
    {
        $questions = FaqQuestion::with('category')->get();
        return view('admin.faq.questions.index', compact('questions'));
    }

    // Show form to create a new FAQ question
    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.questions.create', compact('categories'));
    }

    // Store a new FAQ question
    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        FaqQuestion::create(
            $request->only('faq_category_id', 'question', 'answer')
        );

        return redirect()->route('admin.faq.questions.index');
    }

    // Show form to edit an existing question
    public function edit(FaqQuestion $question)
    {
        $categories = FaqCategory::all();
        return view(
            'admin.faq.questions.edit',
            compact('question', 'categories')
        );
    }

    // Update an existing FAQ question
    public function update(Request $request, FaqQuestion $question)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $question->update(
            $request->only('faq_category_id', 'question', 'answer')
        );

        return redirect()->route('admin.faq.questions.index');
    }

    // Delete an FAQ question
    public function destroy(FaqQuestion $question)
    {
        $question->delete();
        return back();
    }
}
