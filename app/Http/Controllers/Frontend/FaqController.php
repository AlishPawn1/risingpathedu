<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Normal FAQs (no category)
        $faqs = Faq::whereNull('category_id')->get();

        // Categorized FAQs
        $faqsTabs = FaqCategory::with('faqs')->get()->map(function ($cat) {
            return [
                'title' => $cat->title,
                'faqs' => $cat->faqs->map(function ($faq) {
                    return [
                        'title' => $faq->title,
                        'description' => $faq->description,
                    ];
                }),
            ];
        });

        return view('frontend.faq', compact('faqs', 'faqsTabs'));
    }
}
