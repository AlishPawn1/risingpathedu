<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::orderBy('display_order')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create() {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request) {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service) {
        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service) {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        if ($request->hasFile('image')) {
            if ($service->image) Storage::disk('public')->delete($service->image);
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service) {
        if ($service->image) Storage::disk('public')->delete($service->image);
        $service->delete();
        return back()->with('success', 'Service deleted.');
    }
}
