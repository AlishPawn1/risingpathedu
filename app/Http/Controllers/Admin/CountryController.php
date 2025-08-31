<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $query = Country::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('short_text', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $perPage = $request->get('per_page', 10);
        $countries = $query->orderBy('created_at', 'desc')->paginate($perPage);

        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'flag' => 'required|image|max:4096',
            'image' => 'nullable|image|max:4096',
            'short_text' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'description' => 'required|string',
            'institutes' => 'nullable|string',
            'media_type' => 'nullable|in:image,video',
        ]);

        // Handle media_url
        if ($request->media_type === 'image' && $request->hasFile('media_url')) {
            $data['media_url'] = $request->file('media_url')->store('country_media', 'public');
        } elseif ($request->media_type === 'video') {
            $data['media_url'] = $request->media_url;
        }

        // Generate unique slug
        $slug = Str::slug($data['name']);
        $originalSlug = $slug;
        $counter = 1;
        while (Country::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        $data['slug'] = $slug;

        // Handle flag upload
        if ($request->hasFile('flag')) {
            $flag = $request->file('flag');
            $flagName = time() . '_' . Str::random(10) . '.' . $flag->getClientOriginalExtension();
            $data['flag'] = $flag->storeAs('country', $flagName, 'public');
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Country::create($data);

        return redirect()->route('admin.countries.index')->with('success', 'Country created successfully.');
    }

    public function show(Country $country)
    {
        return view('admin.countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'flag' => 'nullable|image|max:4096',
            'image' => 'nullable|image|max:4096',
            'short_text' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'description' => 'required|string',
            'institutes' => 'nullable|string',
            'media_type' => 'nullable|in:image,video',
        ]);

        // Update slug if name changed
        $slug = $country->slug;
        if ($data['name'] !== $country->name) {
            $slug = Str::slug($data['name']);
            $originalSlug = $slug;
            $counter = 1;
            while (Country::where('slug', $slug)->where('id', '!=', $country->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
        }
        $data['slug'] = $slug;

        // Handle flag update
        if ($request->hasFile('flag')) {
            if ($country->flag && Storage::disk('public')->exists($country->flag)) {
                Storage::disk('public')->delete($country->flag);
            }
            $flag = $request->file('flag');
            $flagName = time() . '_' . Str::random(10) . '.' . $flag->getClientOriginalExtension();
            $data['flag'] = $flag->storeAs('country', $flagName, 'public');
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($country->image && Storage::disk('public')->exists($country->image)) {
                Storage::disk('public')->delete($country->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Handle media_url
        if ($request->media_type === 'image' && $request->hasFile('media_url')) {
            if ($country->media_url && Storage::disk('public')->exists($country->media_url)) {
                Storage::disk('public')->delete($country->media_url);
            }
            $data['media_url'] = $request->file('media_url')->store('country_media', 'public');
        } elseif ($request->media_type === 'video') {
            $data['media_url'] = $request->media_url;
        }

        $country->update($data);

        return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        try {
            // Delete flag if exists
            if ($country->flag && Storage::disk('public')->exists($country->flag)) {
                Storage::disk('public')->delete($country->flag);
            }

            // Delete image if exists
            if ($country->image && Storage::disk('public')->exists($country->image)) {
                Storage::disk('public')->delete($country->image);
            }

            // Delete media_url (image file) if exists
            if ($country->media_url && $country->media_type === 'image' && Storage::disk('public')->exists($country->media_url)) {
                Storage::disk('public')->delete($country->media_url);
            }

            $country->delete();

            return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.countries.index')->withErrors(['general' => 'An error occurred while deleting the country: ' . $e->getMessage()]);
        }
    }
}