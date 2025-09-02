<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', 1)->latest()->paginate(10);
        return view('frontend.service', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first();

        if (!$service) {
            \Log::error("Service not found for slug: " . $slug); // Add this line
            return redirect()->route('services.index')->with('error', 'Service not found.');
        }

        $relatedServices = Service::where('id', '!=', $service->id)
            ->get();

        $faqs = $service->faqs()->get(); 
        $service->load('faqs');
        return view('frontend.service-details', compact('service', 'relatedServices', 'faqs'));
    }
}