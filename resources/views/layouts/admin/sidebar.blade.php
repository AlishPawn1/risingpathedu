<aside class="bg-white border-end border-light min-vh-100 sticky-top w-full">
    <nav>
        <div class="logo px-3 py-4 text-center">
            <a href="/">
                <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="logo-img">
            </a>
        </div>
        <ul class="list-unstyled d-flex flex-column gap-2 px-3">
            <li><a href="{{ url('admin/dashboard') }}" class="menu-item">Dashboard</a></li>
            <li><a href="{{ url('admin/blogs') }}" class="menu-item">Blogs</a></li>
            <li><a href="{{ url('admin/teams') }}" class="menu-item">Teams</a></li>
            <li><a href="{{ url('admin/testimonials') }}" class="menu-item">Testimonials</a></li>
            <li><a href="{{ url('admin/courses') }}" class="menu-item">Courses</a></li>
            <li><a href="{{ url('admin/countries') }}" class="menu-item">Countries</a></li>
            <li><a href="{{ url('admin/services') }}" class="menu-item">Service</a></li>
        </ul>
    </nav>
</aside>