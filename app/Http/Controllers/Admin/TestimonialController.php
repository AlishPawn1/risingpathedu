<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Storage;
use Str;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $testimonials = Testimonials::query();

        if ($request->filled('search')) {
            $testimonials->where('name', 'like', '%' . $request->search . '%');
        }

        $testimonials = $testimonials->paginate($request->get('per_page', 10));

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'post' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            // Generate unique slug
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $counter = 1;

            while (Testimonials::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $data = $request->only(['name', 'post', 'description']);
            $data['slug'] = $slug;

            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $data['image'] = $image->storeAs('testimonial', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            Testimonials::create($data);
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while creating the testimonial: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Testimonials $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonials $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonials $testimonial)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'post' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $slug = $testimonial->slug;
            if ($request->name !== $testimonial->name) {
                $slug = Str::slug($request->name);
                $originalSlug = $slug;
                $counter = 1;

                while (Testimonials::where('slug', $slug)->where('id', '!=', $testimonial->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }
            $data = $request->only(['name', 'post', 'description']);
            $data['slug'] = $slug;

            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $data['image'] = $image->storeAs('testimonial', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            $testimonial->update($data);
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while updating the testimonial: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Testimonials $testimonial)
    {
        try {
            // Delete image if exists
            if ($testimonial->image && Storage::disk('public')->exists($testimonial->image)) {
                Storage::disk('public')->delete($testimonial->image);
            }

            $testimonial->delete();

            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.testimonials.index')->withErrors(['general' => 'An error occurred while deleting the testimonial: ' . $e->getMessage()]);
        }
    }

}
