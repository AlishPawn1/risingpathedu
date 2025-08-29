<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $services = $services->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }
        $perPage = $request->get('per_page', 10);
        $services = $services->orderBy('created_at', 'desc')->paginate($perPage);

        $services->appends($request->query());

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'short_description' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|max:2048',
                'is_active' => 'required|boolean',
                'faqs' => 'nullable|array',
                'faqs.*.title' => 'required_with:faqs|string|max:255',
                'faqs.*.description' => 'nullable|string',
            ]);

            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Service::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $serviceData = $request->only(['title', 'short_description', 'description', 'is_active']);
            $serviceData['slug'] = $slug;

            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $serviceData['image'] = $image->storeAs('services', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            // Create the service
            $service = Service::create($serviceData);

            // Create FAQs if provided
            if ($request->has('faqs') && is_array($request->faqs)) {
                foreach ($request->faqs as $faqData) {
                    if (!empty($faqData['title'])) {
                        $service->faqs()->create([
                            'title' => $faqData['title'],
                            'description' => $faqData['description'] ?? null,
                        ]);
                    }
                }
            }

            return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
        } catch (\Throwable $th) {
            return back()->withErrors(['general' => 'Failed to create service: ' . $th->getMessage()])->withInput();
        }
    }

    public function update(Request $request, Service $service)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'short_description' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|max:2048',
                'is_active' => 'required|boolean',
                'faqs' => 'nullable|array',
                'faqs.*.title' => 'required_with:faqs|string|max:255',
                'faqs.*.description' => 'nullable|string',
            ]);

            $slug = $service->slug;
            if ($request->title !== $service->title) {
                $slug = Str::slug($request->title);
                $originalSlug = $slug;
                $counter = 1;

                while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }

            $serviceData = $request->only(['title', 'short_description', 'description', 'is_active']);
            $serviceData['slug'] = $slug;

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    // Delete old image if exists
                    if ($service->image && Storage::disk('public')->exists($service->image)) {
                        Storage::disk('public')->delete($service->image);
                    }

                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $serviceData['image'] = $image->storeAs('services', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            $service->update($serviceData);

            // Handle FAQs - delete existing and create new ones
            $service->faqs()->delete();

            if ($request->has('faqs') && is_array($request->faqs)) {
                foreach ($request->faqs as $faqData) {
                    if (!empty($faqData['title'])) {
                        $service->faqs()->create([
                            'title' => $faqData['title'],
                            'description' => $faqData['description'] ?? null,
                        ]);
                    }
                }
            }

            return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
        } catch (\Throwable $th) {
            return back()->withErrors(['general' => 'Failed to update service: ' . $th->getMessage()])->withInput();
        }
    }

    public function edit(Service $service)
    {
        $service->load('faqs');
        return view('admin.services.edit', compact('service'));
    }

    public function show(Service $service)
    {
        $service->load('faqs');
        return view('admin.services.show', compact('service'));
    }

    public function storeFaq(Request $request, Service $service)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
        $service->faqs()->create($data);
        return back()->with('success', 'FAQ added.');
    }

    public function destroy(Service $service)
    {
        try {
            // Delete image if exists
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $service->delete();

            return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.services.index')->withErrors(['general' => 'An error occurred while deleting the service: ' . $e->getMessage()]);
        }
    }
}
