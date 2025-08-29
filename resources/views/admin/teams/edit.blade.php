@extends('layouts.admin.app')
@section('title', 'Edit Team')

@section('content')

    <section class="py-4">
        <div class="container-fluid">
            <div class="content-wrap">
                <div class="title-wrap">
                    <h2 class="h5 mb-1">Edit Team Member</h2>
                    <p class="small m-0">Update team member information</p>
                </div>

                <div class="form-wrap">
                    <form method="POST" action="{{ route('admin.teams.update', $team) }}" class="row g-4" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')

                        @include('admin.teams._form', ['team' => $team])

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Team Member
                            </button>
                            <a href="{{ route('admin.teams.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
