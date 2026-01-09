<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Store a new comment on a news item
    public function store(Request $request, News $news)
    {
        // Validate comment input
        $data = $request->validate([
            'body' => 'required|string',
        ]);

        // Create the comment for the logged-in user
        Comment::create([
            'body'    => $data['body'],
            'user_id' => auth()->id(),
            'news_id' => $news->id,
        ]);

        return back();
    }

    // Delete a comment
    public function destroy(Comment $comment)
    {
        // Only the owner or an admin can delete the comment
        if (auth()->id() !== $comment->user_id && !auth()->user()?->isAdmin()) {
            abort(403);
        }

        $comment->delete();

        return back()->with('success', 'Comment verwijderd.');
    }
}
