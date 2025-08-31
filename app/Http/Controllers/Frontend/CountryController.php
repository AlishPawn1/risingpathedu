<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        // Use lowercase 'countries' for variable and compact
        $countries = Country::where('is_active', 1)->latest()->paginate(12);
        return view('frontend.country', compact('countries'));
    }

    public function show($slug)
    {
        $country = Country::where('slug', $slug)->firstOrFail();
        return view('frontend.country-details', compact('country'));
    }
}
