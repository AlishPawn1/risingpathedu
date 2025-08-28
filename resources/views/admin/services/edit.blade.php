@extends('layouts.admin')
@section('title','Edit Service')
@section('content')
<h1 class="h4 mb-3">Edit Service</h1>
<form method="POST" action="{{ route('admin.services.update',$service) }}" enctype="multipart/form-data" class="card card-body">
  @csrf @method('PUT')
  @include('admin.services._form', ['service' => $service])
  <div class="mt-3">
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
