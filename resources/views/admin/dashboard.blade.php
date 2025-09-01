@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
<section class="dashboard py-5 bg-light">
    <div class="container-fluid px-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header border-0 rounded-top py-3 bg-white d-flex justify-content-between align-items-center">
                <h1 class="h3 fw-bold mb-0">Admin Dashboard</h1>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </button>
                </form>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 card-tile card-tile--blue">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Quick Actions</h5>
                                <p class="card-text text-muted small">Manage your content efficiently</p>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Go to Services</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 card-tile card-tile--green">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Analytics</h5>
                                <p class="card-text text-muted small">View your site statistics</p>
                                <a href="#" class="btn btn-success">View Analytics</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 card-tile card-tile--purple">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Settings</h5>
                                <p class="card-text text-muted small">Configure your application</p>
                                <a href="#" class="btn btn-purple">Edit Settings</a>
                                <!-- <a href="{{ route('admin.about.edit') }}" class="btn btn-purple">Edit Settings</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
