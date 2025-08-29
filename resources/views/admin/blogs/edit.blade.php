@extends('layouts.admin.app')
@section('title', 'Edit Blog')

@section('content')
  <section>
    <div class="container-fluid py-4">
      <div class="content-wrap">
        <div class="title-wrap">
          <h2 class="h5 mb-1">Edit Blog</h2>
          <p class="small m-0">Update the blog details</p>
        </div>
        <div class="">
          <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data"
            class="row g-4">
            @csrf 
            @method('PUT')
            @include('admin.blogs._form', ['blog' => $blog])

            <div class="col-12">
              <button class="btn btn-primary"><i class="fas fa-save me-2"></i>Update Blog</button>
              <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection