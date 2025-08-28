@extends('layouts.admin')
@section('title','Add Service')
@section('content')
<h1 class="h4 mb-3">Add Service</h1>
<form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="card card-body">
  @csrf
  @include('admin.services._form', ['service' => null])
  <div class="mt-3">
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
