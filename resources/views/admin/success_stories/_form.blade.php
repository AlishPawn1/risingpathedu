@php
    $countries = $countries ?? collect();
    $services = $services ?? collect();
@endphp

<div class="col-md-6">
    <label class="form-label">Title *</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $story->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Student Name *</label>
    <input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror"
        value="{{ old('student_name', $story->student_name ?? '') }}" required>
    @error('student_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Country *</label>
    <select name="country" class="form-select @error('country') is-invalid @enderror" required>
        <option value="">Select Country</option>
        @foreach($countries as $country)
            <option value="{{ $country }}" @selected(old('country', $story->country ?? '') == $country)>
                {{ $country }}
            </option>
        @endforeach
    </select>
    @error('country')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Service</label>
    <input type="text" name="service" class="form-control @error('service') is-invalid @enderror"
        value="{{ old('service', $story->service ?? '') }}">
    @error('service')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">University</label>
    <input type="text" name="university" class="form-control @error('university') is-invalid @enderror"
        value="{{ old('university', $story->university ?? '') }}">
    @error('university')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-3">
    <label class="form-label">Intake</label>
    <input type="text" name="intake" class="form-control @error('intake') is-invalid @enderror"
        value="{{ old('intake', $story->intake ?? '') }}">
    @error('intake')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-3">
    <label class="form-label">Visa Approved</label>
    <select name="visa_approved" class="form-select @error('visa_approved') is-invalid @enderror">
        <option value="1" @selected(old('visa_approved', $story->visa_approved ?? 0) == 1)>Yes</option>
        <option value="0" @selected(old('visa_approved', $story->visa_approved ?? 0) == 0)>No</option>
    </select>
    @error('visa_approved')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
    <small class="form-text text-muted">Accepted formats: JPEG, PNG, JPG, GIF, SVG, WebP. Max size: 2MB</small>
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if(!empty($story->image) && Storage::disk('public')->exists($story->image))
        <div class="mt-2">
            <small class="text-muted">Current image:</small>
            <div class="mt-1">
                <img src="{{ asset('storage/' . $story->image) }}" alt="Current Image" class="img-thumbnail"
                    style="width: 100px; height: 100px; object-fit: cover;">
            </div>
        </div>
    @endif
</div>

<div class="col-12">
    <label class="form-label">Summary *</label>
    <textarea name="summary" class="form-control @error('summary') is-invalid @enderror"
        rows="3">{{ old('summary', $story->summary ?? '') }}</textarea>
    @error('summary')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">Testimonial *</label>
    <textarea name="testimonial" id="content-editor" class="form-control @error('testimonial') is-invalid @enderror"
        rows="6">{{ old('testimonial', $story->testimonial ?? '') }}</textarea>
    @error('testimonial')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-3">
    <label class="form-label">Published</label>
    <select name="is_published" class="form-select @error('is_published') is-invalid @enderror">
        <option value="1" @selected(old('is_published', $story->is_published ?? 0) == 1)>Yes</option>
        <option value="0" @selected(old('is_published', $story->is_published ?? 0) == 0)>No</option>
    </select>
    @error('is_published')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>