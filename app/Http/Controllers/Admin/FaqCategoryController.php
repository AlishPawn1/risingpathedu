<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FaqCategoryController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 10;
        $search = $request->search;

        $categories = FaqCategory::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        })->paginate($perPage);

        return view('admin.faq-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.faq-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        FaqCategory::create($validated);

        return redirect()->route('admin.faq-categories.index')->with('success', 'FAQ Category created successfully.');
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq-categories.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories,name,' . $faqCategory->id,
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $faqCategory->update($validated);

        return redirect()->route('admin.faq-categories.index')->with('success', 'FAQ Category updated successfully.');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')->with('success', 'FAQ Category deleted successfully.');
    }
}