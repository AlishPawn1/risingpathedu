
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light w-100">
    <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
        <div class="card-body p-4">
            <h1 class="h4 text-center mb-4 fw-bold">Admin Panel</h1>
            <form method="POST" action="{{ url('admin/login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="admin@gmail.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-dark w-100 mt-2">Login</button>
                @if(session('error'))
                    <div class="text-danger text-center mt-2">{{ session('error') }}</div>
                @endif
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>
