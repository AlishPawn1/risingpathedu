<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    public function index() {
        $countries = Country::orderBy('name')->paginate(15);
        return view('admin.countries.index', compact('countries'));
    }

    public function create() {
        return view('admin.countries.create');
    }

    public function store(StoreCountryRequest $request) {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        if ($request->hasFile('flag')) {
            $data['flag'] = $request->file('flag')->store('countries', 'public');
        }
        Country::create($data);
        return redirect()->route('admin.countries.index')->with('success','Country created.');
    }

    public function edit(Country $country) {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country) {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        if ($request->hasFile('flag')) {
            if ($country->flag) Storage::disk('public')->delete($country->flag);
            $data['flag'] = $request->file('flag')->store('countries', 'public');
        }
        $country->update($data);
        return redirect()->route('admin.countries.index')->with('success','Country updated.');
    }

    public function destroy(Country $country) {
        if ($country->flag) Storage::disk('public')->delete($country->flag);
        $country->delete();
        return back()->with('success','Country deleted.');
    }
}
