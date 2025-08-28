@extends('layouts.admin')
@section('title','Edit Success Story')
@section('content')
<h1 class="h4 mb-3">Edit Success Story</h1>
<form method="POST" action="{{ route('admin.success-stories.update',$story) }}" enctype="multipart/form-data" class="card card-body">
  @csrf @method('PUT')
  @include('admin.success_stories._form', ['story' => $story])
  <div class="mt-3">
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.success-stories.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
