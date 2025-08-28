<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title', $service->title ?? '') }}" required>
    @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Slug (optional)</label>
    <input name="slug" class="form-control" value="{{ old('slug', $service->slug ?? '') }}">
    @error('slug')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-12">
    <label class="form-label">Short Description</label>
    <input name="short_description" class="form-control" value="{{ old('short_description', $service->short_description ?? '') }}">
    @error('short_description')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-12">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="5">{{ old('description', $service->description ?? '') }}</textarea>
    @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-md-4">
    <label class="form-label">Icon (optional)</label>
    <input name="icon" class="form-control" value="{{ old('icon', $service->icon ?? '') }}">
  </div>

  <div class="col-md-4">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($service?->image))
      <img src="{{ asset('storage/'.$service->image) }}" class="img-thumbnail mt-2" style="max-height:120px">
    @endif
    @error('image')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-md-2">
    <label class="form-label">Active</label>
    <select name="is_active" class="form-select">
      <option value="1" @selected(old('is_active',$service->is_active ?? 1)==1)>Yes</option>
      <option value="0" @selected(old('is_active',$service->is_active ?? 1)==0)>No</option>
    </select>
  </div>
  <div class="col-md-2">
    <label class="form-label">Order</label>
    <input name="display_order" type="number" min="0" class="form-control" value="{{ old('display_order', $service->display_order ?? 0) }}">
  </div>

  <div class="col-md-6">
    <label class="form-label">Meta Title</label>
    <input name="meta_title" class="form-control" value="{{ old('meta_title', $service->meta_title ?? '') }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">Meta Description</label>
    <input name="meta_description" class="form-control" value="{{ old('meta_description', $service->meta_description ?? '') }}">
  </div>
</div>
