<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Start query with eager loading
        $query = Blog::with(['categories', 'tags']);

        // Filter by search if provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by status if provided
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category if provided
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // Paginate results (relationships are already eager loaded)
        $blogs = $query->paginate($request->get('per_page', 10));

        // Fetch categories for filters or display
        $categories = Category::pluck('name');

        // Return to view
        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $allCategories = Category::orderBy('name')->get();
        $allTags = Tag::orderBy('name')->get();
        return view('admin.blogs.create', compact('allCategories', 'allTags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'description' => 'required',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'tags' => 'array',
            'categories' => 'array',
        ]);

        $slug = Str::slug($request->title);
        if (Blog::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('blogs', 'public') : null;

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->author,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        // Attach existing and new tags/categories
        $tagIds = $request->tags ? array_map('intval', $request->tags) : [];
        $catIds = $request->categories ? array_map('intval', $request->categories) : [];

        if ($request->filled('new_tags')) {
            $newTags = array_filter(array_map('trim', explode(',', $request->new_tags)));
            foreach ($newTags as $name) {
                $tag = Tag::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                );
                $tagIds[] = $tag->id;
            }
        }

        if ($request->filled('new_categories')) {
            $newCats = array_filter(array_map('trim', explode(',', $request->new_categories)));
            foreach ($newCats as $name) {
                $cat = Category::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                );
                $catIds[] = $cat->id;
            }
        }

        $blog->tags()->sync(array_values(array_unique($tagIds)));
        $blog->categories()->sync(array_values(array_unique($catIds)));

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $allTags = Tag::orderBy('name')->get();
        $allCategories = Category::orderBy('name')->get();
        $selectedTagIds = $blog->tags()->pluck('tags.id')->toArray();
        $selectedCategoryIds = $blog->categories()->pluck('categories.id')->toArray();

        return view('admin.blogs.edit', compact(
            'blog',
            'allTags',
            'allCategories',
            'selectedTagIds',
            'selectedCategoryIds'
        ));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'description' => 'required',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'tags' => 'array',
            'categories' => 'array',
        ]);

        $slug = Str::slug($request->title);
        if (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
            $slug .= '-' . time();
        }
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('blogs', 'public') : $blog->image;
        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image); 
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->author,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        $tagIds = $request->tags ? array_map('intval', $request->tags) : [];
        $catIds = $request->categories ? array_map('intval', $request->categories) : [];

        if ($request->filled('new_tags')) {
            $newTags = array_filter(array_map('trim', explode(',', $request->new_tags)));
            foreach ($newTags as $name) {
                $tag = Tag::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                );
                $tagIds[] = $tag->id;
            }
        }

        if ($request->filled('new_categories')) {
            $newCats = array_filter(array_map('trim', explode(',', $request->new_categories)));
            foreach ($newCats as $name) {
                $cat = Category::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                );
                $catIds[] = $cat->id;
            }
        }

        $blog->tags()->sync(array_values(array_unique($tagIds)));
        $blog->categories()->sync(array_values(array_unique($catIds)));

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete image file if it exists
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
