<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Service;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $blogs = Blog::where(function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%");
        })
            ->where('status', 'published')
            ->paginate(9);

        $countries = Country::where(function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%");
        })
            ->where('is_active', 1)
            ->paginate(9);

        $services = Service::where(function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('short_description', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%");
        })
            ->where('is_active', 1)
            ->paginate(9);

        $courses = Courses::where(function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%");
        })
            ->paginate(9);

        return view('frontend.search', compact('query', 'blogs', 'countries', 'services', 'courses'));
    }
}