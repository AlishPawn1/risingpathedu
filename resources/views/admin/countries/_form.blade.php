<div class="col-md-6">
  <label class="form-label">Name <span class="required">*</span></label>
  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
    value="{{ old('name', $country->name ?? '') }}" required>
  @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<!-- Short Text Field -->
<div class="col-md-6">
  <label class="form-label">Short Text <span class="required">*</span></label>
  <input type="text" name="short_text" class="form-control @error('short_text') is-invalid @enderror"
    value="{{ old('short_text', $country->short_text ?? '') }}" required>
  @error('short_text')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<!-- Flag Field -->
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

<!-- image field -->
<div class="col-md-6">
  <label class="form-label">Image<span class="required">*</span></label>
  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
  @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  @if(!empty($country?->image))
    <img src="{{ asset('storage/' . $country->image) }}" class="img-thumbnail mt-2" style="max-height:120px">
  @endif
  <small class="text-muted">Accepted formats: JPG, JPEG, PNG, WEBP (Max: 4MB)</small>
</div>

<!-- Active Field -->
<div class="col-md-6">
  <label class="form-label">Active <span class="required">*</span></label>
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
  @error('is_active')
    <div class="invalid-feedback d-block">{{ $message }}</div>
  @enderror
</div>

<!-- Description Field -->
<div class="col-12">
  <label class="form-label">Description <span class="required">*</span></label>
  <textarea name="description" id="content-editor" class="form-control @error('description') is-invalid @enderror"
    rows="4">{{ old('description', $country->description ?? '') }}</textarea>
  @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<!-- Institutes Field -->
<div class="col-12">
  <label class="form-label">Institutes (one per line)</label>
  <textarea name="institutes" id="institutes"
    class="form-control @error('institutes') is-invalid @enderror">{{ old('institutes', $country->institutes ?? '') }}</textarea>
  @error('institutes')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<!-- Media Type Field -->
<div class="col-md-6">
  <label class="form-label">Media Type</label>
  <select name="media_type" id="media_type" class="form-control @error('media_type') is-invalid @enderror">
    <option value="image" {{ old('media_type', $country->media_type ?? '') == 'image' ? 'selected' : '' }}>Image</option>
    <option value="video" {{ old('media_type', $country->media_type ?? '') == 'video' ? 'selected' : '' }}>Video</option>
  </select>
  @error('media_type')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<!-- Media URL Field -->
<div class="col-md-6" id="media-url-field">
  <label class="form-label">Media URL (YouTube link or image upload)</label>
  <input type="file" name="media_url" id="media_url_file" class="form-control @error('media_url') is-invalid @enderror"
    style="display:none;" accept="image/*">
  <input type="text" name="media_url" id="media_url_text" class="form-control @error('media_url') is-invalid @enderror"
    style="display:none;" value="{{ old('media_url', $country->media_url ?? '') }}">
  @error('media_url')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  @if(!empty($country->media_type) && $country->media_type == 'image' && !empty($country->media_url))
    <img src="{{ asset('storage/' . $country->media_url) }}" class="img-thumbnail mt-2" style="max-height:100px">
  @endif
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    function toggleMediaInput() {
      var type = document.getElementById('media_type').value;
      var fileInput = document.getElementById('media_url_file');
      var textInput = document.getElementById('media_url_text');
      if (type === 'image') {
        fileInput.style.display = 'block';
        textInput.style.display = 'none';
      } else {
        fileInput.style.display = 'none';
        textInput.style.display = 'block';
      }
    }
    document.getElementById('media_type').addEventListener('change', toggleMediaInput);
    toggleMediaInput(); // Initial call
  });
</script>