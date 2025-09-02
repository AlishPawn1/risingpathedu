@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Courses',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Courses'],
        ]
    ])
    @endcomponent

    <!--<< Service Section Start >>-->
    <section class="service-section fix section-padding">
        <div class="container">
            <div class="service-wrapper p-0">
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
                        {{ $courses->links('vendor.pagination.custom') }}
                    </div>
                @endif
            </div>
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

    <!--<< Visa Service Section Start >>-->
    <section class="visa-service-section fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Courses We Provide</span>
                <h2 class="title-anim">Explore Our Visa Citizenship & <br> Immigration Courses</h2>
            </div>
            <div class="row">
                @foreach ($courses->take(3) as $index => $course)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 * $index }}s">
                        <div class="service-visa-items">
                            <div class="service-visa-thumb">
                                <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/img/backfall-user.png') }}"
                                    alt="{{ $course->name }}-image">
                                <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/img/backfall-user.png') }}"
                                    alt="{{ $course->name }}-image">
                                <a href="{{ url('course/' . $course->slug) }}" class="image-overlay">
                                    <i class="fal fa-plus"></i>
                                </a>
                            </div>
                            <div class="service-visa-content">
                                <h3><a href="{{ url('course/' . $course->slug) }}">{{ $course->name }}</a></h3>
                                <p>
                                    {!! Str::limit($course->description, 50) !!}
                                </p>
                                <a href="{{ url('course/' . $course->slug) }}" class="link-btn">
                                    <span>read more</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--<< Contact Section Start >>-->
    <x-contact-section />

@endsection