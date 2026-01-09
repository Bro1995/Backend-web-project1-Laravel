<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Show all news items in the admin panel
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::all()
        ]);
    }

    // Show form to create a new news item
    public function create()
    {
        return view('admin.news.create');
    }

    // Store a new news item in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Save image if one was uploaded
        if ($request->hasFile('image')) {
            $validated['image'] =
                $request->file('image')->store('news_images', 'public');
        }

        // Link news item to the logged-in admin
        $validated['user_id'] = auth()->id();
        $validated['published_at'] = now();

        News::create($validated);

        return redirect()->route('admin.news.index');
    }

    // Show edit form for an existing news item
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    // Update an existing news item
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
        ]);

        // Update image if a new one is uploaded
        if ($request->hasFile('image')) {
            $validated['image'] =
                $request->file('image')->store('news_images', 'public');
        }

        $news->update($validated);

        return redirect()->route('admin.news.index');
    }

    // Delete a news item
    public function destroy(News $news)
    {
        $news->delete();
        return back();
    }
}
