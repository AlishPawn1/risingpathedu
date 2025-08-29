<div class="col-md-6">
  <label class="form-label">Name *</label>
  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
    value="{{ old('name', $country->name ?? '') }}" required>
  @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="col-md-6">
  <label class="form-label">Flag (image)<span class="required">*</span></label>
  <input type="file" name="flag" class="form-control @error('flag') is-invalid @enderror" accept="image/*">
  @error('flag')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  @if(!empty($country?->flag))
    <img src="{{ asset('storage/' . $country->flag) }}" class="img-thumbnail mt-2" style="max-height:120px">
  @endif
  <small class="text-muted">Accepted formats: JPG, JPEG, PNG, WEBP (Max: 4MB)</small>
</div>

<div class="col-md-6">
  <label for="form-label">Short Text <span class="required">*</span></label>
  <input type="text" name="short_text" class="form-control @error('short_text') is-invalid @enderror"
    value="{{ old('short_text', $country->short_text ?? '') }}">
  @error('short_text')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="col-md-6">
  <label class="form-label">Active *</label>
  <div class="d-flex gap-3">
    <div class="form-check">
      <input type="radio" class="form-check-input" name="is_active" value="1" id="active-yes" {{ old('is_active', $country->is_active ?? 0) == 1 ? 'checked' : '' }}>
      <label for="active-yes" class="form-check-label">Yes</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" name="is_active" value="0" id="active-no" {{ old('is_active', $country->is_active ?? 0) == 0 ? 'checked' : '' }}>
      <label for="active-no" class="form-check-label">No</label>
    </div>
  </div>
</div>

<div class="col-12">
  <label class="form-label">Description <span class="required">*</span></label>
  <textarea name="description" id="content-editor" class="form-control @error('description') is-invalid @enderror"
    rows="4">{{ old('description', $country->description ?? '') }}</textarea>
  @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

