<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', 1)->latest()->get();
        $teams = Team::latest()->get();
        $testimonials = Testimonials::latest()->get();

        return view('frontend.about', compact('services', 'teams', 'testimonials'));
    }
}