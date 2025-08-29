@extends('layouts.admin.app')
@section('title', 'Add Course')

@section('content')
    <section class="py-4">
        <div class="container-fluid">
            <div class="content-wrap">
                <div class="title-wrap">
                    <h2 class="h5 mb-1">Add New Course</h2>
                    <p class="small m-0">Create a new course</p>
                </div>
                <div class="form-wrap">
                    <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data"
                        class="row g-4">
                        @csrf
                        @include('admin.courses._form', ['course' => null])

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Course
                            </button>
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection