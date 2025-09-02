@include('layouts.main.header')
<!-- Toast container -->
<div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer"></div>
@yield('content')

@include('layouts.main.footer')

@if(session('success') || session('error') || $errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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