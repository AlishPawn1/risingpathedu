<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 10;
        $search = $request->search;
        $categoryId = $request->category_id;

        $faqs = Faq::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('question', 'like', "%{$search}%")
                      ->orWhere('answer', 'like', "%{$search}%");
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('faq_category_id', $categoryId);
            })
            ->paginate($perPage);

        $categories = FaqCategory::all();

        return view('admin.faqs.index', compact('faqs', 'categories'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}