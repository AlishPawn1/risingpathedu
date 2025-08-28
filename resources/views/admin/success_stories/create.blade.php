@extends('layouts.admin')
@section('title','Add Success Story')
@section('content')
<h1 class="h4 mb-3">Add Success Story</h1>
<form method="POST" action="{{ route('admin.success-stories.store') }}" enctype="multipart/form-data" class="card card-body">
  @csrf
  @include('admin.success_stories._form', ['story' => null])
  <div class="mt-3">
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('admin.success-stories.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
