<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Courses::latest()->paginate(10);
        return view('frontend.courses', compact('courses'));
    }

    public function show($slug)
    {
        $course = Courses::where('slug', $slug)->first();

        if (!$course) {
            \Log::error("Course not found for slug: " . $slug); // Add this line
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }

        $relatedCourses = Courses::where('id', '!=', $course->id)
            ->get();

        return view('frontend.course-details', compact('course', 'relatedCourses'));
    }
}
