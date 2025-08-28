@extends('layouts.admin')
@section('title','About Us')
@section('content')
<h1 class="h4 mb-3">About Us</h1>
<form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" class="card card-body">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Heading</label>
      <input name="heading" class="form-control" value="{{ old('heading', $about->heading) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control">
      @if($about->image)
        <img src="{{ asset('storage/'.$about->image) }}" class="img-thumbnail mt-2" style="max-height:120px">
      @endif
    </div>
    <div class="col-12">
      <label class="form-label">Content</label>
      <textarea name="content" class="form-control" rows="5">{{ old('content', $about->content) }}</textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">Mission</label>
      <textarea name="mission" class="form-control" rows="4">{{ old('mission', $about->mission) }}</textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">Vision</label>
      <textarea name="vision" class="form-control" rows="4">{{ old('vision', $about->vision) }}</textarea>
    </div>

    <div class="col-md-4">
      <label class="form-label">Email</label>
      <input name="email" type="email" class="form-control" value="{{ old('email', $about->email) }}">
    </div>
    <div class="col-md-4">
      <label class="form-label">Phone</label>
      <input name="phone" class="form-control" value="{{ old('phone', $about->phone) }}">
    </div>
    <div class="col-md-4">
      <label class="form-label">Address</label>
      <input name="address" class="form-control" value="{{ old('address', $about->address) }}">
    </div>

    <div class="col-md-6">
      <label class="form-label">Facebook URL</label>
      <input name="facebook_url" class="form-control" value="{{ old('facebook_url', $about->facebook_url) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Instagram URL</label>
      <input name="instagram_url" class="form-control" value="{{ old('instagram_url', $about->instagram_url) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">LinkedIn URL</label>
      <input name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $about->linkedin_url) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">YouTube URL</label>
      <input name="youtube_url" class="form-control" value="{{ old('youtube_url', $about->youtube_url) }}">
    </div>

    <div class="col-md-6">
      <label class="form-label">Meta Title</label>
      <input name="meta_title" class="form-control" value="{{ old('meta_title', $about->meta_title) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Meta Description</label>
      <input name="meta_description" class="form-control" value="{{ old('meta_description', $about->meta_description) }}">
    </div>
  </div>

  <div class="mt-3">
    <button class="btn btn-primary">Save</button>
  </div>
</form>
@endsection
