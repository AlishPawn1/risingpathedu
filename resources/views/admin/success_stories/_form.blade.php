@php
  $countries = $countries ?? collect();
  $services  = $services ?? collect();
@endphp
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title', $story->title ?? '') }}" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Student Name</label>
    <input name="student_name" class="form-control" value="{{ old('student_name', $story->student_name ?? '') }}" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Country</label>
    <select name="country_id" class="form-select" required>
      <option value="">-- select --</option>
      @foreach($countries as $id=>$name)
        <option value="{{ $id }}" @selected(old('country_id', $story->country_id ?? '')==$id)>{{ $name }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label">Service</label>
    <select name="service_id" class="form-select">
      <option value="">-- optional --</option>
      @foreach($services as $id=>$name)
        <option value="{{ $id }}" @selected(old('service_id', $story->service_id ?? '')==$id)>{{ $name }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label">University</label>
    <input name="university" class="form-control" value="{{ old('university', $story->university ?? '') }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Intake</label>
    <input name="intake" class="form-control" value="{{ old('intake', $story->intake ?? '') }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Visa Approved</label>
    <select name="visa_approved" class="form-select">
      <option value="1" @selected(old('visa_approved',$story->visa_approved ?? 1)==1)>Yes</option>
      <option value="0" @selected(old('visa_approved',$story->visa_approved ?? 1)==0)>No</option>
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($story?->image))
      <img src="{{ asset('storage/'.$story->image) }}" class="img-thumbnail mt-2" style="max-height:120px">
    @endif
  </div>
  <div class="col-12">
    <label class="form-label">Summary</label>
    <textarea name="summary" class="form-control" rows="3">{{ old('summary', $story->summary ?? '') }}</textarea>
  </div>
  <div class="col-12">
    <label class="form-label">Testimonial</label>
    <textarea name="testimonial" class="form-control" rows="6">{{ old('testimonial', $story->testimonial ?? '') }}</textarea>
  </div>
  <div class="col-md-3">
    <label class="form-label">Published</label>
    <select name="is_published" class="form-select">
      <option value="1" @selected(old('is_published',$story->is_published ?? 1)==1)>Yes</option>
      <option value="0" @selected(old('is_published',$story->is_published ?? 1)==0)>No</option>
    </select>
  </div>
  <div class="col-md-3">
    <label class="form-label">Published At</label>
    <input type="datetime-local" name="published_at" class="form-control"
           value="{{ old('published_at', isset($story->published_at) ? $story->published_at->format('Y-m-d\TH:i') : '') }}">
  </div>
</div>
