<aside class="bg-white border-end border-light min-vh-100 sticky-top w-full shadow-sm">
    <nav>
        <div class="logo px-4 py-4 text-center border-bottom border-light">
            <a href="/">
                <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="logo-img" class="img-fluid" style="max-height: 50px;">
            </a>
        </div>
        <ul class="list-unstyled d-flex flex-column gap-1 px-3 py-3">
            <li>
                <a href="{{ url('admin/dashboard') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/dashboard') ? 'active bg-light' : '' }}">
                    <i class="fas fa-tachometer-alt fa-fw"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/blogs') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/blogs*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-blog fa-fw"></i>
                    <span>Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/teams') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/teams*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-users fa-fw"></i>
                    <span>Teams</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/testimonials') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/testimonials*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-quote-left fa-fw"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/courses') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/courses*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-book fa-fw"></i>
                    <span>Courses</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/countries') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/countries*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-globe fa-fw"></i>
                    <span>Countries</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/services') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/services*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-concierge-bell fa-fw"></i>
                    <span>Service</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/faq') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/faq*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-question-circle fa-fw"></i>
                    <span>FAQs</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/success-stories') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/success-stories*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-trophy fa-fw"></i>
                    <span>Success Stories</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/contacts') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/contacts*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span>Contacts</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/site-settings') }}" class="menu-item d-flex align-items-center gap-3 px-3 py-2 rounded text-dark text-decoration-none {{ request()->is('admin/site-settings*') ? 'active bg-light' : '' }}">
                    <i class="fas fa-cog fa-fw"></i>
                    <span>Site Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>