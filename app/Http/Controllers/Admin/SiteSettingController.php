<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteSettingController extends Controller
{
    public function index(Request $request)
    {
        $query = SiteSetting::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('site_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('contact_number', 'like', "%$search%");
            });
        }

        $perPage = $request->get('per_page', 10);
        $siteSettings = $query->orderBy('created_at', 'desc')->paginate($perPage);

        $siteSettings->appends($request->query());

        return view('admin.site-settings.index', compact('siteSettings'));
    }

    public function create()
    {
        return view('admin.site-settings.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'site_name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'secondary_email' => 'nullable|email|max:255',
                'contact_number' => 'nullable|string|max:255',
                'secondary_contact_number' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'map_embed' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'facebook' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
                'youtube' => 'nullable|url|max:255',
                'footer_text' => 'nullable|string',
                'business_hours' => 'nullable|string|max:255',
                'site_logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'footer_logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'favicon' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,ico|max:1024',
            ]);

            $data = $request->except(['site_logo', 'footer_logo', 'favicon']);

            foreach (['site_logo', 'footer_logo', 'favicon'] as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $fileName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                    $data[$field] = $file->storeAs('site-settings', $fileName, 'public');
                }
            }

            SiteSetting::create($data);

            return redirect()->route('admin.site-settings.index')->with('success', 'Site setting created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'An error occurred: '.$e->getMessage()])->withInput();
        }
    }

    public function edit(SiteSetting $setting)
    {
        return view('admin.site-settings.edit', compact('setting'));
    }

    public function update(Request $request, SiteSetting $setting)
    {
        try {
            $request->validate([
                'site_name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'secondary_email' => 'nullable|email|max:255',
                'contact_number' => 'nullable|string|max:255',
                'secondary_contact_number' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'map_embed' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'facebook' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
                'youtube' => 'nullable|url|max:255',
                'footer_text' => 'nullable|string',
                'business_hours' => 'nullable|string|max:255',
                'site_logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'footer_logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'favicon' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,ico|max:1024',
            ]);

            $data = $request->except(['site_logo', 'footer_logo', 'favicon']);

            foreach (['site_logo', 'footer_logo', 'favicon'] as $field) {
                if ($request->hasFile($field)) {
                    if ($setting->$field && Storage::disk('public')->exists($setting->$field)) {
                        Storage::disk('public')->delete($setting->$field);
                    }
                    $file = $request->file($field);
                    $fileName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                    $data[$field] = $file->storeAs('site-settings', $fileName, 'public');
                }
            }

            $setting->update($data);

            return redirect()->route('admin.site-settings.index')->with('success', 'Site setting updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'An error occurred: '.$e->getMessage()])->withInput();
        }
    }

    public function destroy(SiteSetting $setting)
    {
        try {
            foreach (['site_logo', 'footer_logo', 'favicon'] as $field) {
                if ($setting->$field && Storage::disk('public')->exists($setting->$field)) {
                    Storage::disk('public')->delete($setting->$field);
                }
            }

            $setting->delete();

            return redirect()->route('admin.site-settings.index')->with('success', 'Site setting deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.site-settings.index')->withErrors(['general' => 'An error occurred: '.$e->getMessage()]);
        }
    }
}
