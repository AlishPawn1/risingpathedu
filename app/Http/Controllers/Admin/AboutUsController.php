<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function edit() {
        $about = AboutUs::firstOrCreate([]);
        return view('admin.about.edit', compact('about'));
    }

    public function update(UpdateAboutUsRequest $request) {
        $about = AboutUs::firstOrCreate([]);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($about->image) Storage::disk('public')->delete($about->image);
            $data['image'] = $request->file('image')->store('about','public');
        }
        $about->update($data);
        return back()->with('success','About Us updated.');
    }
}
