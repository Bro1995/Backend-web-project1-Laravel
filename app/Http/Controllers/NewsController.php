<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Show public list of news items
    public function index()
    {
        $news = News::latest('published_at')->paginate(10);

        return view('news.index', compact('news'));
    }

    // Show a single news item (public)
    public function show(News $news)
    {
        $news->load(['author', 'comments.user']);

        return view('news.show', compact('news'));
    }

    // Show all news items in admin panel
    public function adminIndex()
    {
        $news = News::latest('published_at')->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    // Show form to create a news item (admin)
    public function create()
    {
        return view('news.create');
    }

    // Store a new news item (admin)
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);

        // Save image if uploaded
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $data['user_id'] = $request->user()->id;
        $data['published_at'] = now();

        News::create($data);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem aangemaakt.');
    }

    // Show edit form for a news item (admin)
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    // Update an existing news item (admin)
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);

        // Replace image if a new one is uploaded
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem bijgewerkt.');
    }

    // Delete a news item (admin)
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem verwijderd.');
    }
}
