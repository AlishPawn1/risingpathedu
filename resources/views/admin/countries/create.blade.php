@extends('layouts.admin.app')
@section('title', 'Add Country')

@section('content')
<section class="py-4">
  <div class="container-fluid">
    <div class="content-wrap">
      <div class="title-wrap">
        <h2 class="h5 mb-1">Add New Country</h2>
        <p class="small m-0">Create a new country</p>
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

        <form method="POST" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data" class="row g-4">
          @csrf
          @include('admin.countries._form', ['country' => null])

          <div class="col-12">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Create Country</button>
            <a href="{{ route('admin.countries.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection