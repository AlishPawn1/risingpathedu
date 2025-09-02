<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Testimonials;

class FrontendController extends Controller
{
    // Homepage
    public function index()
    {
        $services = Service::where('is_active', 1)->latest()->take(10)->get();
        $countries = Country::where('is_active', 1)->latest()->take(10)->get();
        $blogs = Blog::where('status', 1)->latest()->take(10)->get();
        $teams = Team::latest()->take(10)->get();
        $testimonials = Testimonials::latest()->take(10)->get();

        return view('frontend.index', compact('services', 'countries', 'blogs', 'teams', 'testimonials'));
    }

    // Services page
    public function services()
    {
        $services = Service::latest()->paginate(12);
        return view('frontend.services', compact('services'));
    }

    // Blog page
    public function blogs()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('frontend.blogs', compact('blogs'));
    }

    // Team page
    public function team()
    {
        $teams = Team::latest()->get();
        return view('frontend.team', compact('teams'));
    }

    // Testimonials page
    public function testimonials()
    {
        $testimonials = Testimonials::latest()->get();
        return view('frontend.testimonials', compact('testimonials'));
    }
}