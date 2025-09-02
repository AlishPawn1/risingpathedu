@extends('layouts.main.app')

@section('content')
    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Search Results',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Search Results'],
        ]
    ])
    @endcomponent

    <section class="service-section fix section-padding">
        <div class="container">
            <h2 class="mb-3">Search Results for "{{ $query }}"</h2>

            @if ($courses->isNotEmpty() || $blogs->isNotEmpty() || $countries->isNotEmpty() || $services->isNotEmpty())
                <!-- Courses Section -->
                @if ($courses->isNotEmpty())
                    <div class="service-wrapper p-0">
                        <h3 class="mb-3">Courses</h3>
                        <div class="row g-4">
                            @foreach ($courses as $index => $course)
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 * $index }}s">
                                    <div class="service-card-items {{ $index == 2 ? 'active' : '' }}">
                                        <div>
                                            <h3><a href="{{ url('course/' . $course->slug) }}">{{ $course->name }}</a></h3>
                                            <span class="duration-wrapper">
                                                <i class="far fa-clock"></i> {{ $course->duration }}
                                            </span>
                                            <p>
                                                {!! Str::limit($course->description, 50) !!}
                                            </p>
                                        </div>
                                        <div>
                                            <div class="service-thumb">
                                                <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/img/backfall-user.png') }}"
                                                    alt="{{ $course->name }}-image">
                                            </div>
                                            <a href="{{ url('course/' . $course->slug) }}" class="link-btn">
                                                <span>read more</span>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($courses->hasPages())
                            <div class="mt-4">
                                {{ $courses->appends(['query' => $query])->links('vendor.pagination.custom') }}
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Blogs Section -->
                @if ($blogs->isNotEmpty())
                    <div class="service-wrapper p-0 mt-5">
                        <h3 class="mb-3">Blogs</h3>
                        <div class="row g-4">
                            @foreach ($blogs as $index => $blog)
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".{{ 3 + 2 * $loop->index }}s">
                                    <div class="news-box-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                            <h6 class="date">{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}
                                                <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}</span>
                                            </h6>
                                        </div>
                                        <div class="news-content">
                                            <ul class="post-date">
                                                <li>
                                                    <i class="far fa-user-circle"></i>
                                                    {{ $blog->author ?? 'Admin' }}
                                                </li>
                                                <li>
                                                    <i class="fal fa-comments"></i>
                                                    {{ $blog->comments->count() ?? 0 }} Comments
                                                </li>
                                            </ul>
                                            <h3><a href="{{ url('news', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                            <p>
                                                {{ Str::limit(strip_tags($blog->description), 100) }}
                                            </p>
                                            <a href="{{ url('news', $blog->slug) }}" class="link-btn">
                                                <span>Read More</span> <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($blogs->hasPages())
                            <div class="mt-4">
                                {{ $blogs->appends(['query' => $query])->links('vendor.pagination.custom') }}
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Countries Section -->
                @if ($countries->isNotEmpty())
                    <div class="service-wrapper p-0 mt-5">
                        <h3 class="mb-3">Countries</h3>
                        <div class="row g-4">
                            @foreach ($countries as $index => $country)
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.3 + (0.2 * $loop->index) }}s">
                                    <div class="countries-card-items">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/' . $country->flag) }}" alt="{{ $country->name }}">
                                        </div>
                                        <div class="content">
                                            <h3><a href="{{ route('countries.show', $country->slug) }}">{{ $country->name }}</a></h3>
                                            <p>{{ Str::limit($country->short_text, 50) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($countries->hasPages())
                            <div class="mt-4">
                                {{ $countries->appends(['query' => $query])->links('vendor.pagination.custom') }}
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Services Section -->
                @if ($services->isNotEmpty())
                    <div class="service-wrapper p-0 mt-5">
                        <h3 class="mb-3">Services</h3>
                        <div class="row g-4">
                            @foreach ($services as $index => $service)
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 * $index }}s">
                                    <div class="service-card-items {{ $index == 2 ? 'active' : '' }}">
                                        <div>
                                            <h3><a href="{{ url('service/' . $service->slug) }}">{{ $service->name }}</a></h3>
                                            <p>
                                                {!! Str::limit($service->description, 50) !!}
                                            </p>
                                        </div>
                                        <div>
                                            <div class="service-thumb">
                                                <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/img/backfall-user.png') }}"
                                                    alt="{{ $service->name }}-image">
                                            </div>
                                            <a href="{{ url('service/' . $service->slug) }}" class="link-btn">
                                                <span>read more</span>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($services->hasPages())
                            <div class="mt-4">
                                {{ $services->appends(['query' => $query])->links('vendor.pagination.custom') }}
                            </div>
                        @endif
                    </div>
                @endif
            @else
                <p>No results found for your search.</p>
            @endif
        </div>
    </section>

    <!--<< Cta Contact Section Start >>-->
    <section class="cta-banner-contact-section fix section-padding bg-cover"
        style="background-image: url('{{ asset('assets/img/contact-bg.jpg') }}');">
        <div class="container">
            <div class="cta-banner-concat-wrapper">
                <h2 class="title-anim">We Counsel Students to Get <br> Study Visas</h2>
                <a href="{{ url('contact') }}" class="theme-btn hover-white wow fadeInUp" data-wow-delay=".5s">
                    <span>
                        Contact Us
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>
@endsection