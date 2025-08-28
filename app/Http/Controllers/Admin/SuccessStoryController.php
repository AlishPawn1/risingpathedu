<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuccessStoryRequest;
use App\Http\Requests\UpdateSuccessStoryRequest;
use App\Models\Country;
use App\Models\Service;
use App\Models\SuccessStory;
use Illuminate\Support\Facades\Storage;

class SuccessStoryController extends Controller
{
    public function index() {
        $stories = SuccessStory::with(['country','service'])
            ->latest('id')->paginate(15);
        return view('admin.success_stories.index', compact('stories'));
    }

    public function create() {
        $countries = Country::orderBy('name')->pluck('name','id');
        $services  = Service::orderBy('title')->pluck('title','id');
        return view('admin.success_stories.create', compact('countries','services'));
    }

    public function store(StoreSuccessStoryRequest $request) {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('stories','public');
        }
        SuccessStory::create($data);
        return redirect()->route('admin.success-stories.index')->with('success','Story created.');
    }

    public function edit(SuccessStory $success_story) {
        $countries = Country::orderBy('name')->pluck('name','id');
        $services  = Service::orderBy('title')->pluck('title','id');
        return view('admin.success_stories.edit', [
            'story' => $success_story,
            'countries' => $countries,
            'services' => $services,
        ]);
    }

    public function update(UpdateSuccessStoryRequest $request, SuccessStory $success_story) {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($success_story->image) Storage::disk('public')->delete($success_story->image);
            $data['image'] = $request->file('image')->store('stories','public');
        }
        $success_story->update($data);
        return redirect()->route('admin.success-stories.index')->with('success','Story updated.');
    }

    public function destroy(SuccessStory $success_story) {
        if ($success_story->image) Storage::disk('public')->delete($success_story->image);
        $success_story->delete();
        return back()->with('success','Story deleted.');
    }
}
