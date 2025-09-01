@extends('layouts.admin.app')
@section('title', 'Add FAQ')

@section('content')
    <section class="py-4">
        <div class="container-fluid">
            <div class="content-wrap">
                <div class="title-wrap">
                    <h2 class="h5 mb-1">Add New FAQ</h2>
                    <p class="small m-0">Create new FAQs and categories</p>
                </div>
                <div class="form-wrap">
                    <form method="POST" action="{{ route('admin.faq.store') }}" class="row g-4">
                        @csrf
                        @include('admin.faq._form', ['faq' => null])
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create FAQ
                            </button>
                            <a href="{{ route('admin.faq.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection