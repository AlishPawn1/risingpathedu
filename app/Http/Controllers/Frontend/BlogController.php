<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        if ($request->has('keywords') && $request->keywords) {
            $keywords = $request->keywords;
            $query->where('title', 'like', "%{$keywords}%");
        }

        $query->where('status', 'published');

        $popularBlogs = Blog::withCount('comments')
            ->orderByDesc('comments_count')
            ->take(3)
            ->get();

        $categories = Category::all();
        $tags = Tag::all();
        $blogs = $query->latest()->paginate(10);

        return view('frontend.news', compact('blogs', 'categories', 'tags', 'popularBlogs'));
        // return view('frontend.news-grid', compact('blogs', 'popularBlogs', 'categories', 'tags'));
    }
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 'published')
            ->with(['comments', 'tags'])
            ->firstOrFail();

        // Get popular blogs (e.g., by views or latest)
        $popularBlogs = Blog::orderBy('views', 'desc')->take(5)->get();

        // Get categories and tags for sidebar
        $categories = Category::with('blogs')->get();
        $tags = Tag::all();

        return view('frontend.news-details', compact('blog', 'popularBlogs', 'categories', 'tags'));
    }
}

