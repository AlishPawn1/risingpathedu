<div class="col-md-6">
    <label class="form-label">Name *</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $testimonial->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Post/Position *</label>
    <input type="text" name="post" class="form-control @error('post') is-invalid @enderror"
        value="{{ old('post', $testimonial->post ?? '') }}" required>
    @error('post')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">Description *</label>
    <textarea name="description" id="content-editor" class="form-control @error('description') is-invalid @enderror"
        rows="4">{{ old('description', $testimonial->description ?? '') }}</textarea>
    @error('description')
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

    {{-- Current image preview --}}
    @if (!empty($testimonial->image) && Storage::disk('public')->exists($testimonial->image))
        <div class="mt-2">
            <small class="text-muted">Current image:</small>
            <div class="mt-1">
                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Current Image" class="img-thumbnail"
                    style="width: 100px; height: 100px; object-fit: cover;">
            </div>
        </div>
    @endif
</div>