<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
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

    public function store(StoreCountryRequest $request)
    {
        $validated = $request->validated();

        // Generate unique slug
        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;
        while (Country::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $data = $request->only(['name', 'short_text', 'description', 'is_active']);
        $data['slug'] = $slug;

        // Handle flag upload
        if ($request->hasFile('flag')) {
            $flag = $request->file('flag');
            $flagName = time() . '_' . Str::random(10) . '.' . $flag->getClientOriginalExtension();
            $data['flag'] = $flag->storeAs('country', $flagName, 'public'); // Stored in storage/app/public/country
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

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $validated = $request->validated();

        // Update slug if name changed
        $slug = $country->slug;
        if ($validated['name'] !== $country->name) {
            $slug = Str::slug($validated['name']);
            $originalSlug = $slug;
            $counter = 1;
            while (Country::where('slug', $slug)->where('id', '!=', $country->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        $data = $request->only(['name', 'short_text', 'description', 'is_active']);
        $data['slug'] = $slug;

        // Handle flag update
        if ($request->hasFile('flag')) {
            // Delete old flag if exists
            if ($country->flag && Storage::disk('public')->exists($country->flag)) {
                Storage::disk('public')->delete($country->flag);
            }

            $flag = $request->file('flag');
            $flagName = time() . '_' . Str::random(10) . '.' . $flag->getClientOriginalExtension();
            $data['flag'] = $flag->storeAs('country', $flagName, 'public');
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

            $country->delete();

            return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.countries.index')->withErrors(['general' => 'An error occurred while deleting the country: ' . $e->getMessage()]);
        }
    }
}
