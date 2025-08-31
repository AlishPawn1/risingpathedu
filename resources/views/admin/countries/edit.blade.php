@extends('layouts.admin.app')
@section('title', 'Edit Country')
@section('content')
  <section class="py-4">
    <div class="container-fluid">
      <div class="content-wrap">
        <div class="title-wrap">
          <h2 class="h5 mb-1">Edit Country</h2>
          <p class="small m-0">Update a country</p>
        </div>
        <div class="">
          <form method="POST" action="{{ route('admin.countries.update', $country) }}" enctype="multipart/form-data"
            class="row g-4">
            @csrf @method('PUT')
            @include('admin.countries._form', ['country' => $country])
            <div class="col-md-6">
              <button class="btn btn-primary"><i class="fas fa-save me-2"></i> Update</button>
              <a href="{{ route('admin.countries.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection