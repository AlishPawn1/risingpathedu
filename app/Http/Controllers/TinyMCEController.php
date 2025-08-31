<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TinyMCEController extends Controller
{
    public function upload(Request $request)
    {
        // Validate file
        $request->validate([
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'], // 5MB
        ]);

        // Folder comes from JS (default: blog)
        $folder = $request->input('folder', 'blog');

        // Whitelist folders
        $allowed = ['blog', 'testimonial', 'team', 'service', 'country', 'page'];
        if (! in_array($folder, $allowed)) {
            $folder = 'misc'; // fallback folder
        }

        // Save to storage/app/public/uploads/{folder}
        $path = $request->file('file')->store("uploads/{$folder}", 'public');

        return response()->json([
            'location' => Storage::url($path), // e.g. /storage/uploads/blog/abc.png
        ]);
    }
}
