<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class BlogInteractionController extends Controller
{
    public function addComment(Request $request, $blogId)
    {
        $request->validate([
            'author' => 'required|string|max:100',
            'content' => 'required|string|max:1000',
        ]);

        $blog = Blog::findOrFail($blogId);

        $comment = new Comment([
            'author' => $request->author,
            'content' => $request->content,
        ]);
        $blog->comments()->save($comment);

        return redirect()->route('blogs.show', $blogId)->with('success', 'Comment added successfully.');
    }

    public function countView($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $blog->increment('views');
        return response()->json(['views' => $blog->views]);
    }
}