<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $successStories = SuccessStory::where('is_published', true)->latest()->paginate(10);
        return view('frontend.success-stories', compact('successStories'));
    }

    public function show($slug)
    {
        $successStory = SuccessStory::where('slug', $slug)->first();

        if (!$successStory) {
            \Log::error("Success Story not found for slug: " . $slug); // Add this line
            return redirect()->route('success-stories.index')->with('error', 'Success Story not found.');
        }

        return view('frontend.success-story-details', compact('successStory'));
    }
}
