@extends('layouts.admin.app')
@section('title', 'Add Success Story')

@section('content')
<section class="py-4">
    <div class="container-fluid">
        <div class="content-wrap">
            <div class="title-wrap">
                <h2 class="h5 mb-1">Add New Success Story</h2>
                <p class="small m-0">Create a new success story</p>
            </div>
            <div class="form-wrap">
                <form method="POST" action="{{ route('admin.success-stories.store') }}" enctype="multipart/form-data"
                    class="row g-4">
                    @csrf

                    @include('admin.success_stories._form', ['story' => null])

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Create Story</button>
                        <a href="{{ route('admin.success-stories.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection