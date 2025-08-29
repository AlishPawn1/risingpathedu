<div class="col-md-6">
    <label class="form-label">Team Name *</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $team->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Post/Position *</label>
    <input type="text" name="post" class="form-control @error('post') is-invalid @enderror"
        value="{{ old('post', $team->post ?? '') }}" required>
    @error('post')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">Description <span class="required">*</span></label>
    <textarea name="description" id="content-editor" class="form-control @error('description') is-invalid @enderror"
        rows="4">{{ old('description', $team->description ?? '') }}</textarea>
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
    @if (!empty($team->image) && Storage::disk('public')->exists($team->image))
        <div class="mt-2">
            <small class="text-muted">Current image:</small>
            <div class="mt-1">
                <img src="{{ asset('storage/' . $team->image) }}" alt="Current team image" class="img-thumbnail"
                    style="width: 100px; height: 100px; object-fit: cover;">
            </div>
        </div>
    @endif
</div>

<div class="col-md-6"></div>

<div class="col-md-3">
    <label class="form-label">Facebook Link</label>
    <input type="url" name="facebook" class="form-control @error('facebook') is-invalid @enderror"
        value="{{ old('facebook', $team->facebook ?? '') }}" placeholder="https://facebook.com/username">
    @error('facebook')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-3">
    <label class="form-label">Twitter Link</label>
    <input type="url" name="twitter" class="form-control @error('twitter') is-invalid @enderror"
        value="{{ old('twitter', $team->twitter ?? '') }}" placeholder="https://twitter.com/username">
    @error('twitter')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-3">
    <label class="form-label">Instagram Link</label>
    <input type="url" name="instagram" class="form-control @error('instagram') is-invalid @enderror"
        value="{{ old('instagram', $team->instagram ?? '') }}" placeholder="https://instagram.com/username">
    @error('instagram')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-3">
    <label class="form-label">LinkedIn Link</label>
    <input type="url" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror"
        value="{{ old('linkedin', $team->linkedin ?? '') }}" placeholder="https://linkedin.com/in/username">
    @error('linkedin')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>