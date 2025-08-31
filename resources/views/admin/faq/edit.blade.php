@extends('layouts.admin.app')
@section('title', 'Edit FAQ')

@section('content')
    <section class="py-4">
        <div class="container-fluid">
            <div class="content-wrap">
                <div class="title-wrap">
                    <h2 class="h5 mb-1">Edit FAQ</h2>
                    <p class="small m-0">Update FAQ information</p>
                </div>
                <div class="form-wrap">
                    <form method="POST" action="{{ route('admin.faqs.update', $faq) }}" class="row g-4">
                        @csrf
                        @method('PUT')
                        @include('admin.faqs._form', ['faq' => $faq])
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update FAQ
                            </button>
                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection