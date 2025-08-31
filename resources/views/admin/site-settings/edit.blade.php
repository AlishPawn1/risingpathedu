@extends('layouts.admin.app')
@section('title', 'Edit Site Setting')

@section('content')
<section class="py-4">
    <div class="container-fluid">
        <div class="content-wrap">
            <div class="title-wrap">
                <h2 class="h5 mb-1">Edit Site Setting</h2>
                <p class="small m-0">Update site setting information</p>
            </div>
            <div class="form-wrap">
                <form method="POST" action="{{ route('admin.site-settings.update', $setting) }}" enctype="multipart/form-data" class="row g-4">
                    @csrf
                    @method('PUT')
                    @include('admin.site-settings._form', ['setting' => $setting])
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Setting
                        </button>
                        <a href="{{ route('admin.site-settings.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
