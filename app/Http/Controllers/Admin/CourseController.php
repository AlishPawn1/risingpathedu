<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courses;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index(Request $request)
    {
        $query = Courses::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('duration', 'like', '%' . $search . '%');
            });
        }

        // Pagination
        $perPage = $request->get('per_page', 10);
        $courses = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Preserve query parameters in pagination links
        $courses->appends($request->query());

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'duration' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            // Generate unique slug
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $counter = 1;
            
            while (Courses::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $data = $request->only(['name', 'description', 'duration']);
            $data['slug'] = $slug;

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $data['image'] = $image->storeAs('courses', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            Courses::create($data);

            return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'An error occurred while creating the course: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified course.
     */
    public function show(Courses $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit(Courses $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, Courses $course)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'duration' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            // Generate unique slug only if name changed
            $slug = $course->slug;
            if ($request->name !== $course->name) {
                $slug = Str::slug($request->name);
                $originalSlug = $slug;
                $counter = 1;
                
                while (Courses::where('slug', $slug)->where('id', '!=', $course->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }

            $data = $request->only(['name', 'description', 'duration']);
            $data['slug'] = $slug;

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    // Delete old image if exists
                    if ($course->image && Storage::disk('public')->exists($course->image)) {
                        Storage::disk('public')->delete($course->image);
                    }
                    
                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $data['image'] = $image->storeAs('courses', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            $course->update($data);

            return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'An error occurred while updating the course: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy(Courses $course)
    {
        try {
            // Delete image if exists
            if ($course->image && Storage::disk('public')->exists($course->image)) {
                Storage::disk('public')->delete($course->image);
            }

            $course->delete();
            
            return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.courses.index')->withErrors(['general' => 'An error occurred while deleting the course: ' . $e->getMessage()]);
        }
    }
}