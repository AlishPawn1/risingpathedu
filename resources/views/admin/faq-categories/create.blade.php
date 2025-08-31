@extends('layouts.admin.app')
@section('title', 'Add FAQ Category')

@section('content')
    <section class="py-4">
        <div class="container-fluid">
            <div class="content-wrap">
                <div class="title-wrap">
                    <h2 class="h5 mb-1">Add New FAQ Category</h2>
                    <p class="small m-0">Create a new FAQ category</p>
                </div>
                <div class="form-wrap">
                    <form method="POST" action="{{ route('admin.faq-categories.store') }}" class="row g-4">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Name *</label>
                            <input name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Category
                            </button>
                            <a href="{{ route('admin.faq-categories.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection