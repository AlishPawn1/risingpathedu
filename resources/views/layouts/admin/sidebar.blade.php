<aside class="bg-white border-end border-light min-vh-100 sticky-top w-full">
    <nav>
        <div class="logo px-3 py-4 text-center">
            <a href="/">
                <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="logo-img">
            </a>
        </div>
        <ul class="list-unstyled d-flex flex-column gap-2 px-3">
            <li><a href="{{ url('admin/dashboard') }}" class="menu-item">Dashboard</a></li>
            <li><a href="{{ url('admin/blog') }}" class="menu-item">Blogs</a></li>
            <li><a href="{{ url('admin/event') }}" class="menu-item">Events</a></li>
            <li><a href="{{ url('admin/portfolio') }}" class="menu-item">Portfolio</a></li>
            <li><a href="{{ url('admin/testimonials') }}" class="menu-item">Testimonials</a></li>
            <li><a href="{{ url('admin/career') }}" class="menu-item">Career</a></li>
            <li><a href="{{ url('admin/teams') }}" class="menu-item">Teams</a></li>
            <li><a href="{{ url('admin/education') }}" class="menu-item">Education</a></li>
            <li><a href="{{ url('admin/service') }}" class="menu-item">Service</a></li>
        </ul>
    </nav>
</aside>