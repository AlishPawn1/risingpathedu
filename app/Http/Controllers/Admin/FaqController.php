<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 10;
        $search = $request->search;
        $categoryId = $request->category_id;

        $query = Faq::query();

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Apply category filter
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $faqs = $query->with('category')
                     ->orderBy('created_at', 'desc')
                     ->paginate($perPage);

        $categories = FaqCategory::with('faqs')->orderBy('title')->get();

        return view('admin.faq.index', compact('faqs', 'categories'));
    }

    public function create()
    {
        $categories = FaqCategory::orderBy('title')->get();
        return view('admin.faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tabbed_categories' => 'sometimes|array',
            'tabbed_categories.*.title' => 'required|string|max:255',
            'tabbed_categories.*.faqs' => 'sometimes|array',
            'tabbed_categories.*.faqs.*.title' => 'required|string|max:255',
            'tabbed_categories.*.faqs.*.description' => 'nullable|string',
            'normal_faqs' => 'sometimes|array',
            'normal_faqs.*.title' => 'required|string|max:255',
            'normal_faqs.*.description' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {
            if ($request->has('tabbed_categories')) {
                foreach ($request->tabbed_categories as $order => $categoryData) {
                    $category = FaqCategory::create([
                        'title' => $categoryData['title'],
                    ]);

                    if (isset($categoryData['faqs'])) {
                        foreach ($categoryData['faqs'] as $faqOrder => $faqData) {
                            Faq::create([
                                'category_id' => $category->id,
                                'title' => $faqData['title'],
                                'description' => $faqData['description'] ?? null,
                            ]);
                        }
                    }
                }
            }

            // Store normal FAQs (without category)
            if ($request->has('normal_faqs')) {
                foreach ($request->normal_faqs as $order => $faqData) {
                    Faq::create([
                        'category_id' => null,
                        'title' => $faqData['title'],
                        'description' => $faqData['description'] ?? null,
                    ]);
                }
            }
        });

        return redirect()->route('admin.faq.index')->with('success', 'FAQs created successfully.');
    }

    public function show(Faq $faq)
    {
        $faq->load('category');
        return view('admin.faq.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        // Load the FAQ with its category
        $faq->load('category');
        
        // Get all categories for the dropdown
        $categories = FaqCategory::orderBy('title')->get();
        
        // If this FAQ belongs to a category, get all FAQs in that category
        if ($faq->category_id) {
            $categoryFaqs = Faq::where('category_id', $faq->category_id)
                              ->orderBy('id')
                              ->get();
            $editingCategory = $faq->category;
        } else {
            $categoryFaqs = collect([$faq]); // Just this single FAQ
            $editingCategory = null;
        }

        // Get all normal FAQs (without category) for reference
        $normalFaqs = Faq::whereNull('category_id')->orderBy('id')->get();

        return view('admin.faq.edit', compact(
            'faq', 
            'categories', 
            'categoryFaqs', 
            'editingCategory', 
            'normalFaqs'
        ));
    }

    public function update(Request $request, Faq $faq)
    {
        // Determine what type of update this is based on the form data
        if ($request->has('single_faq_update')) {
            // Single FAQ update
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'nullable|exists:faq_categories,id',
            ]);

            $faq->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category_id' => $validated['category_id'],
            ]);

            return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully.');
        }

        // Category and FAQs update
        if ($request->has('category_update') && $faq->category_id) {
            $validated = $request->validate([
                'category_title' => 'required|string|max:255',
                'category_faqs' => 'required|array',
                'category_faqs.*.id' => 'nullable|integer',
                'category_faqs.*.title' => 'required|string|max:255',
                'category_faqs.*.description' => 'nullable|string',
            ]);

            DB::transaction(function () use ($request, $faq, $validated) {
                // Update category title
                $category = FaqCategory::findOrFail($faq->category_id);
                $category->update(['title' => $validated['category_title']]);

                // Get existing FAQ IDs in this category
                $existingFaqIds = $category->faqs->pluck('id')->toArray();
                $updatedFaqIds = [];

                // Process each FAQ in the request
                foreach ($validated['category_faqs'] as $faqData) {
                    if (isset($faqData['id']) && $faqData['id']) {
                        // Update existing FAQ
                        $existingFaq = Faq::find($faqData['id']);
                        if ($existingFaq && $existingFaq->category_id == $category->id) {
                            $existingFaq->update([
                                'title' => $faqData['title'],
                                'description' => $faqData['description'],
                            ]);
                            $updatedFaqIds[] = $existingFaq->id;
                        }
                    } else {
                        // Create new FAQ
                        $newFaq = Faq::create([
                            'category_id' => $category->id,
                            'title' => $faqData['title'],
                            'description' => $faqData['description'],
                        ]);
                        $updatedFaqIds[] = $newFaq->id;
                    }
                }

                // Delete FAQs that were not included in the update
                $faqsToDelete = array_diff($existingFaqIds, $updatedFaqIds);
                if (!empty($faqsToDelete)) {
                    Faq::whereIn('id', $faqsToDelete)->delete();
                }
            });

            return redirect()->route('admin.faq.index')->with('success', 'Category and FAQs updated successfully.');
        }

        // Fallback for other update types
        return redirect()->route('admin.faq.index')->with('error', 'Invalid update request.');
    }

    public function destroy(Faq $faq)
    {
        DB::transaction(function () use ($faq) {
            if ($faq->category_id) {
                $category = FaqCategory::find($faq->category_id);
                
                // If this is the only FAQ in the category, delete the category too
                if ($category && $category->faqs()->count() <= 1) {
                    $category->faqs()->delete();
                    $category->delete();
                } else {
                    // Just delete this FAQ
                    $faq->delete();
                }
            } else {
                // Delete normal FAQ
                $faq->delete();
            }
        });

        return redirect()->route('admin.faq.index')->with('success', 'FAQ deleted successfully.');
    }
}