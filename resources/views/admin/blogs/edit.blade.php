@extends('layouts.admin.app')
@section('title','Edit Blog')

@section('content')
<section>
  <div class="container-fluid py-4">
    <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data" class="row g-4">
      @csrf @method('PUT')

      <div class="col-md-6">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title',$blog->title) }}" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control" value="{{ old('author',$blog->author) }}" required>
      </div>

      <div class="col-12">
        <label class="form-label">Content</label>
        <textarea name="description" id="blog-content-add" class="form-control" rows="8" required>{{ old('description',$blog->description) }}</textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Categories</label>
        <div class="d-flex flex-wrap gap-3">
          @foreach($allCategories as $c)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $c->id }}" id="cat-{{ $c->id }}"
                     @checked(in_array($c->id, $selectedCategoryIds))>
              <label class="form-check-label" for="cat-{{ $c->id }}">{{ $c->name }}</label>
            </div>
          @endforeach
        </div>
        <div class="mt-2">
          <input type="text" name="new_categories" class="form-control" placeholder="Add new categories (comma separated)">
        </div>
      </div>

      <div class="col-md-6">
        <label class="form-label">Tags</label>
        <div class="d-flex flex-wrap gap-3">
          @foreach($allTags as $t)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $t->id }}" id="tag-{{ $t->id }}"
                     @checked(in_array($t->id, $selectedTagIds))>
              <label class="form-check-label" for="tag-{{ $t->id }}">{{ $t->name }}</label>
            </div>
          @endforeach
        </div>
        <div class="mt-2">
          <input type="text" name="new_tags" class="form-control" placeholder="Add new tags (comma separated)">
        </div>
      </div>

      <div class="col-md-6">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
        @if($blog->image)
          <div class="mt-2"><img src="{{ asset('storage/'.$blog->image) }}" alt="" style="max-height:120px"></div>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label">Status</label>
        <div class="d-flex gap-3">
          <div class="form-check">
            <input type="radio" class="form-check-input" name="status" value="draft" id="st-draft"
                   @checked($blog->status==='draft')>
            <label for="st-draft" class="form-check-label">Draft</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="status" value="published" id="st-published"
                   @checked($blog->status==='published')>
            <label for="st-published" class="form-check-label">Published</label>
          </div>
        </div>
      </div>

      <div class="col-12">
        <button class="btn btn-primary">Update Blog</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection