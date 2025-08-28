<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
</head>

<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light w-100">
    <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
        <div class="card-body p-4">
            <h1 class="h4 text-center mb-4 fw-bold">Admin Panel</h1>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           placeholder="admin@gmail.com" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               placeholder="Enter your password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark w-100 mt-2">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Toast container -->
    <div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer"></div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>

    {{-- Toast Notifications Script --}}
    @if(session('success') || session('error') || $errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const toastContainer = document.getElementById('toastContainer');

                @if(session('success'))
                    createToast("{{ session('success') }}", "success");
                @endif

                @if(session('error'))
                    createToast("{{ session('error') }}", "danger");
                @endif

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        createToast("{{ $error }}", "danger");
                    @endforeach
                @endif

                function createToast(message, type) {
                    const toastEl = document.createElement('div');
                    toastEl.className = `toast align-items-center text-bg-${type} border-0 mb-2`;
                    toastEl.setAttribute('role', 'alert');
                    toastEl.setAttribute('aria-live', 'assertive');
                    toastEl.setAttribute('aria-atomic', 'true');
                    toastEl.innerHTML = `
                        <div class="d-flex">
                            <div class="toast-body">
                                ${message}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    `;
                    toastContainer.appendChild(toastEl);
                    const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
                    toast.show();
                }
            });
        </script>
    @endif
