@extends('layouts.admin')
@section('title','Add Country')
@section('content')
<h1 class="h4 mb-3">Add Country</h1>
<form method="POST" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data" class="card card-body">
  @csrf
  @include('admin.countries._form', ['country' => null])
  <div class="mt-3">
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
