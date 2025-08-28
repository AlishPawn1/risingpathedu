@extends('layouts.admin')
@section('title','Edit Country')
@section('content')
<h1 class="h4 mb-3">Edit Country</h1>
<form method="POST" action="{{ route('admin.countries.update',$country) }}" enctype="multipart/form-data" class="card card-body">
  @csrf @method('PUT')
  @include('admin.countries._form', ['country' => $country])
  <div class="mt-3">
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
