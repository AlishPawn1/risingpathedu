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

<body>
    <div class="admin-wrap">
        <div class="left">
            @include('layouts.admin.sidebar')

        </div>
        <div class="right">
            @include('layouts.admin.header')

            <main class="admin-content-wrap px-5 mt-5">
                @yield('content')
            </main>
        </div>
    </div>


    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
</body>

</html>