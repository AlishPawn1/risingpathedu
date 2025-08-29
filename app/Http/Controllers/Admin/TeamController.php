<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $query = Team::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('post', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Pagination
        $perPage = $request->get('per_page', 10);
        $teams = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Preserve query parameters in pagination links
        $teams->appends($request->query());

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'post' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'facebook' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
            ]);

            // Generate unique slug
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $counter = 1;
            
            while (Team::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $data = $request->only(['name', 'post', 'description', 'facebook', 'twitter', 'instagram', 'linkedin']);
            $data['slug'] = $slug;

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $data['image'] = $image->storeAs('teams', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            Team::create($data);

            return redirect()->route('admin.teams.index')->with('success', 'Team member created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'An error occurred while creating the team member: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'post' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'facebook' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
            ]);

            // Generate unique slug only if name changed
            $slug = $team->slug;
            if ($request->name !== $team->name) {
                $slug = Str::slug($request->name);
                $originalSlug = $slug;
                $counter = 1;
                
                while (Team::where('slug', $slug)->where('id', '!=', $team->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }

            $data = $request->only(['name', 'post', 'description', 'facebook', 'twitter', 'instagram', 'linkedin']);
            $data['slug'] = $slug;

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    // Delete old image if exists
                    if ($team->image && Storage::disk('public')->exists($team->image)) {
                        Storage::disk('public')->delete($team->image);
                    }
                    
                    $image = $request->file('image');
                    $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $data['image'] = $image->storeAs('teams', $imageName, 'public');
                } catch (\Exception $e) {
                    return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
                }
            }

            $team->update($data);

            return redirect()->route('admin.teams.index')->with('success', 'Team member updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'An error occurred while updating the team member: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Team $team)
    {
        try {
            // Delete image if exists
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }

            $team->delete();
            
            return redirect()->route('admin.teams.index')->with('success', 'Team member deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.teams.index')->withErrors(['general' => 'An error occurred while deleting the team member: ' . $e->getMessage()]);
        }
    }
}