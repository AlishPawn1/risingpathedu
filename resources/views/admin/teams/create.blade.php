@extends('layouts.admin.app')
@section('title', 'Add Team')

@section('content')

    <section class="py-4">
        <div class="container-fluid">
            <div class="content-wrap">
                <div class="title-wrap">
                    <h2 class="h5 mb-1">Add New Team</h2>
                    <p class="small m-0">Create a new team member</p>
                </div>

                <div class="form-wrap">
                    <form method="POST" action="{{ route('admin.teams.store') }}" class="row g-4"
                        enctype="multipart/form-data">
                        @csrf

                        @include('admin.teams._form', ['team' => null])

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Team Member
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