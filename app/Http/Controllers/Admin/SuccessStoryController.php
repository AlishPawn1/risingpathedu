<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Service;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuccessStoryController extends Controller
{
    public function index(Request $request)
    {
        $query = SuccessStory::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('student_name', 'like', '%' . $search . '%')
                    ->orWhere('university', 'like', '%' . $search . '%');
            });
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $stories = $query->orderBy('created_at', 'desc')
            ->paginate($perPage);

        // Preserve query parameters in pagination links
        $stories->appends($request->query());

        return view('admin.success_stories.index', compact('stories'));
    }

    public function create()
    {
        $countries = collect(config('countries'));
        return view('admin.success_stories.create', compact('countries'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'student_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'service' => 'required|string|max:255',
                'university' => 'nullable|string|max:255',
                'intake' => 'nullable|string|max:255',
                'visa_approved' => 'required|boolean',
                'summary' => 'nullable|string|max:1000',
                'testimonial' => 'nullable|string',
                'is_published' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            // Generate unique slug
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (SuccessStory::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $data = $request->only([
                'title',
                'student_name',
                'country',
                'service',
                'university',
                'intake',
                'visa_approved',
                'summary',
                'testimonial',
                'is_published'
            ]);
            $data['slug'] = $slug;

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $data['image'] = $image->storeAs('stories', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            SuccessStory::create($data);

            return redirect()->route('admin.success-stories.index')->with('success', 'Story created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'An error occurred while creating the story: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(SuccessStory $success_story)
    {
        return view('admin.success_stories.show', compact('success_story'));
    }

    public function edit(SuccessStory $success_story)
    {
        $countries = collect(config('countries'));
        return view('admin.success_stories.edit', [
            'story' => $success_story,
            'countries' => $countries
        ]);
    }

    public function update(Request $request, SuccessStory $success_story)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'student_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'service' => 'nullable|string|max:255',
                'university' => 'nullable|string|max:255',
                'intake' => 'nullable|string|max:255',
                'visa_approved' => 'required|boolean',
                'summary' => 'nullable|string|max:1000',
                'testimonial' => 'nullable|string',
                'is_published' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            // Generate unique slug only if title changed
            $slug = $success_story->slug;
            if ($request->title !== $success_story->title) {
                $slug = Str::slug($request->title);
                $originalSlug = $slug;
                $counter = 1;

                while (SuccessStory::where('slug', $slug)->where('id', '!=', $success_story->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }

            $data = $request->only([
                'title',
                'student_name',
                'country',
                'service',
                'university',
                'intake',
                'visa_approved',
                'summary',
                'testimonial',
                'is_published'
            ]);
            $data['slug'] = $slug;

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    // Delete old image if exists
                    if ($success_story->image && Storage::disk('public')->exists($success_story->image)) {
                        Storage::disk('public')->delete($success_story->image);
                    }

                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $data['image'] = $image->storeAs('stories', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            $success_story->update($data);

            return redirect()->route('admin.success-stories.index')->with('success', 'Story updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'An error occurred while updating the story: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(SuccessStory $success_story)
    {
        try {
            // Delete image if exists
            if ($success_story->image && Storage::disk('public')->exists($success_story->image)) {
                Storage::disk('public')->delete($success_story->image);
            }

            $success_story->delete();

            return redirect()->route('admin.success-stories.index')->with('success', 'Story deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.success-stories.index')->withErrors(['general' => 'An error occurred while deleting the story: ' . $e->getMessage()]);
        }
    }
}