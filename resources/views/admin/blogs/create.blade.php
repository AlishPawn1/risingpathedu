@extends('layouts.admin.app')
@section('title','Add Blog')

@section('content')
<section>
  <div class="container-fluid py-4">
    <div class="content-wrap">
          <div class="title-wrap">
            <h2 class="h5 mb-1">Add New Blog</h2>
            <p class="small m-0">Create a new blog</p>
          </div>
          <div class="">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="row g-4">
              @csrf

              <div class="col-md-6">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label class="form-label">Author *</label>
                <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required>
                @error('author')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label class="form-label">Content *</label>
                <textarea name="description" id="blog-content-add" class="form-control @error('description') is-invalid @enderror" rows="8">{{ old('description') }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label class="form-label">Select Categories</label>
                @if($allCategories->count() > 0)
                  <div class="d-flex flex-wrap gap-3 mb-3">
                    @foreach($allCategories as $c)
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $c->id }}" id="cat-{{ $c->id }}" 
                               {{ in_array($c->id, old('categories', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="cat-{{ $c->id }}">{{ $c->name }}</label>
                      </div>
                    @endforeach
                  </div>
                @else
                  <p class="text-muted small">No categories available</p>
                @endif
                <div>
                  <input type="text" name="new_categories" class="form-control" value="{{ old('new_categories') }}" placeholder="Add new categories (comma separated)">
                  <small class="text-muted">Example: Technology, Business, Health</small>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label">Select Tags</label>
                @if($allTags->count() > 0)
                  <div class="d-flex flex-wrap gap-3 mb-3">
                    @foreach($allTags as $t)
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $t->id }}" id="tag-{{ $t->id }}"
                               {{ in_array($t->id, old('tags', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tag-{{ $t->id }}">{{ $t->name }}</label>
                      </div>
                    @endforeach
                  </div>
                @else
                  <p class="text-muted small">No tags available</p>
                @endif
                <div>
                  <input type="text" name="new_tags" class="form-control" value="{{ old('new_tags') }}" placeholder="Add new tags (comma separated)">
                  <small class="text-muted">Example: laravel, php, web-development</small>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Accepted formats: JPG, JPEG, PNG, WEBP (Max: 4MB)</small>
              </div>

              <div class="col-md-6">
                <label class="form-label">Status *</label>
                <div class="d-flex gap-3">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="status" value="draft" id="st-draft" 
                           {{ old('status', 'draft') == 'draft' ? 'checked' : '' }}>
                    <label for="st-draft" class="form-check-label">Draft</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="status" value="published" id="st-published"
                           {{ old('status') == 'published' ? 'checked' : '' }}>
                    <label for="st-published" class="form-check-label">Published</label>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Create Blog</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
  </div>
</section>
@endsection
