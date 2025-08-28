<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Admin')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<div id="app-wrapper">
  {{-- Sidebar --}}
  <aside class="aside">
    <a class="brand" href="{{ route('admin.dashboard') }}">
      <img src="https://dummyimage.com/80x28/0d6efd/ffffff&text=Logo" alt="logo">
      <span class="brand-title">Infotraid</span>
    </a>

    <ul class="menu">
      <li class="menu-title">Menu</li>
      <li>
        <a href="{{ route('admin.dashboard') }}" class="@active('admin.dashboard') active @endactive">
          <i class="bi bi-grid-3x3-gap"></i><span class="label">Dashboard</span>
        </a>
      </li>

      <li class="menu-title mt-2">Education</li>
      <li>
        <a href="{{ route('admin.countries.index') }}" class="@active('admin.countries.*') active @endactive">
          <i class="bi bi-globe2"></i><span class="label">Countries</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.services.index') }}" class="@active('admin.services.*') active @endactive">
          <i class="bi bi-tools"></i><span class="label">Services</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.success-stories.index') }}" class="@active('admin.success-stories.*') active @endactive">
          <i class="bi bi-mortarboard"></i><span class="label">Success Stories</span>
        </a>
      </li>

      <li class="menu-title mt-2">Settings</li>
      <li>
        <a href="{{ route('admin.about.edit') }}" class="@active('admin.about.*') active @endactive">
          <i class="bi bi-gear"></i><span class="label">About Us</span>
        </a>
      </li>
    </ul>
  </aside>

  {{-- Main --}}
  <div class="main">
    <div class="topbar">
      <div class="d-flex align-items-center gap-2">
        <button id="sidebarToggle" class="btn btn-outline-secondary btn-sm">
          <i class="bi bi-list"></i>
        </button>
        <span class="fw-semibold">Admin Panel</span>
      </div>
      <div class="d-flex align-items-center gap-3">
        <div class="text-end small d-none d-sm-block">
          <div class="fw-semibold">Admin</div>
          <div class="text-muted">admin@gmail.com</div>
        </div>
        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width:38px;height:38px;">
          <i class="bi bi-person" style="font-size:1.2rem;"></i>
        </div>
        <form method="POST" action="#" onsubmit="event.preventDefault(); alert('Plug auth later');">
          <button class="btn btn-danger btn-sm">Sign Out</button>
        </form>
      </div>
    </div>

    <main class="content">
      @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
      @yield('content')
    </main>
  </div>
</div>
</body>
</html>
