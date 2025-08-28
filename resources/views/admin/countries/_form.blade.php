<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Name</label>
    <input name="name" class="form-control" value="{{ old('name', $country->name ?? '') }}" required>
    @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Slug (optional)</label>
    <input name="slug" class="form-control" value="{{ old('slug', $country->slug ?? '') }}">
    @error('slug')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-2">
    <label class="form-label">Code</label>
    <input name="code" maxlength="2" class="form-control" value="{{ old('code', $country->code ?? '') }}">
  </div>
  <div class="col-md-4">
    <label class="form-label">Flag (image)</label>
    <input type="file" name="flag" class="form-control">
    @if(!empty($country?->flag))
      <img src="{{ asset('storage/'.$country->flag) }}" class="img-thumbnail mt-2" style="max-height:120px">
    @endif
    @error('flag')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">Active</label>
    <select name="is_active" class="form-select">
      <option value="1" @selected(old('is_active',$country->is_active ?? 1)==1)>Yes</option>
      <option value="0" @selected(old('is_active',$country->is_active ?? 1)==0)>No</option>
    </select>
  </div>
  <div class="col-12">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description', $country->description ?? '') }}</textarea>
  </div>
</div>
