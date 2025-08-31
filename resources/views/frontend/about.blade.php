@extends('layouts.main.app')

@section('content')
    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'About Us',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'About Us'],
        ]
    ])
    @endcomponent

    <!--<< About Section Start >>-->
    <section class="about-section fix section-padding">
        <div class="container">
            <div class="about-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-image-items">
                            <div class="border-shape">
                                <img src="{{ asset('assets/img/about/border-shape.png') }}" alt="shape-img">
                            </div>
                            <div class="about-image bg-cover wow fadeInLeft" data-wow-delay=".3s"
                                style="background-image: url('{{ asset('assets/img/about/about.jpg') }}');">
                                <div class="about-image-2 wow fadeInUp" data-wow-delay=".5s">
                                    <img src="{{ asset('assets/img/about/about-2.jpg') }}" alt="about-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="about-content">
                            <div class="section-title">
                                </h2>
                            </div>
                            <p class=" mt-4 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                Transmds is the world’s driving worldwide coordinations supplier — we uphold industry and
                                exchange the worldwide trade of merchandi
                            </p>
                            <div class="circle-progress-bar-wrapper">
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".3s">
                                    <div class="circle-bar" data-percent="88" data-duration="1000">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            Quick & Easy <br>Process
                                        </h6>
                                    </div>
                                </div>
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".5s">
                                    <div class="circle-bar" data-percent="99" data-duration="1000">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            99% Visa <br>Approvals
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="about-list wow fadeInUp" data-wow-delay=".7s">
                                <li>
                                    <i class="far fa-check me-2"></i>
                                    Immigration & Visa Consulting
                                </li>
                                <li>
                                    <i class="far fa-check me-2"></i>
                                    Direct Online Interview
                                </li>
                                <li>
                                    <i class="far fa-check me-2"></i>
                                    99% Visa Approvals
                                </li>
                            </ul>
                            <div class="about-author">
                                <div class="about-button wow fadeInUp" data-wow-delay=".8s">
                                    <a href="{{ url('about') }}" class="theme-btn">
                                        <span>
                                            Learn More Us
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="author-image wow fadeInUp" data-wow-delay=".9s">
                                    <img src="{{ asset('assets/img/about/author.png') }}" alt="author-img">
                                    <div class="content">
                                        <img src="{{ asset('assets/img/about/signature.png') }}" alt="signature">
                                        <p>Ceo & Founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Service Section Start >>-->
    <section class="service-section fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Service We Provide</span>
                <h2 class="title-anim">
                    Explore Our Visa Citizenship <br>
                    & Immigration Services
                </h2>
            </div>
            <div class="service-wrapper">
                <div class="row">
                    @foreach($services->take(4) as $index => $service)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp"
                            data-wow-delay="{{ 0.2 + (0.2 * $index) }}s">
                            <div class="service-card-items {{ $service->is_featured ? 'active' : '' }}">
                                <h3>
                                    <a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a>
                                </h3>
                                <p>{{ $service->short_text }}</p>
                                <div class="service-thumb">
                                    <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/img/service/default.jpg') }}"
                                        alt="{{ $service->name }}">
                                </div>
                                <a href="{{ route('service.show', $service->slug) }}" class="link-btn">
                                    <span>read more</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!--<< Service Counter Section Start >>-->
    <section class="service-counter-section fix">
        <div class="container">
            <div class="service-counter-wrapper">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="service-counter-content">
                            <div class="section-title">
                                <span class="text-white wow fadeInUp">5m+ Trusted Our Clients</span>
                                <h2 class="text-white title-anim">
                                    fly with us <br>your dream country

                                </h2>
                            </div>
                            <p class="mt-4 mt-md-0 text-white wow fadeInUp" data-wow-delay=".5s">
                                Transmds is the world’s driving worldwide <br>
                                exchange the worldwide trade of
                            </p>
                            <a href="{{ url('service') }}" class="theme-btn bg-white mt-4 wow fadeInUp"
                                data-wow-delay=".7s">
                                <span>
                                    Explore Our Service
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 mt-5 mt-lg-0">
                        <div class="row g-4">
                            <div class="col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                                <div class="service-counter-items">
                                    <div class="icon">
                                        <i class="flaticon-traveling"></i>
                                    </div>
                                    <div class="content">
                                        <h2>
                                            <span class="count">10</span>+
                                        </h2>
                                        <p>
                                            Countries <br>
                                            Represented
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                                <div class="service-counter-items active">
                                    <div class="icon">
                                        <i class="flaticon-visa-6"></i>
                                    </div>
                                    <div class="content">
                                        <h2>
                                            <span class="count">850</span>+
                                        </h2>
                                        <p>
                                            Visa <br>
                                            Completed
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-delay=".7s">
                                <div class="service-counter-items">
                                    <div class="icon">
                                        <i class="flaticon-immigration-officer-1"></i>
                                    </div>
                                    <div class="content">
                                        <h2>
                                            <span class="count">20</span>+
                                        </h2>
                                        <p>
                                            immigration <br>
                                            officer
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Team Section Start >>-->
    <section class="team-section section-padding section-bg-3">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Professional people</span>
                <h2 class="text-white title-anim">
                    Meet Our Expert Visa <br> Consultants.
                </h2>
            </div>
            <div class="row align-items-center">
                @foreach($teams->take(4) as $index => $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 + (0.2 * $index) }}s">
                        <div class="single-team-items">
                            <div class="team-image">
                                <img src="{{ $team->image ? asset('storage/' . $team->image) : asset('assets/img/team/1.png') }}"
                                    alt="{{ $team->name }}">
                                <div class="social-profile">
                                    <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                    <ul>
                                        @if($team->facebook)
                                            <li><a href="{{ $team->facebook }}" target="_blank"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if($team->twitter)
                                            <li><a href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                            </li>
                                        @endif
                                        @if($team->linkedin)
                                            <li><a href="{{ $team->linkedin }}" target="_blank"><i
                                                        class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h5>
                                    <a href="{{ route('teams.show', $team->slug) }}">{{ $team->name }}</a>
                                </h5>
                                <p>{{ $team->post }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="team-button wow fadeInUp" data-wow-delay=".4s">
                <a href="{{ url('/team') }}" class="theme-btn mt-5 hover-white">
                    <span>
                        Explore more team
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!--<< Testimonial Section Start >>-->
    <section class="testimonial-section-4 fix section-padding">
        <div class="container">
            <div class="testimonial-carousel-active-4">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-wrapper-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div class="testimonial-items">
                                    <div class="testimonial-image bg-cover"
                                        style="background-image: url('{{ $testimonial->image ? asset('storage/' . $testimonial->image) : asset('assets/img/testimonial/1.png') }}');">
                                    </div>
                                    <div class="client-info">
                                        <h5>{{ $testimonial->name }}</h5>
                                        <h6>{{ $testimonial->post }}</h6>
                                    </div>
                                    <div class="testimonial-content">
                                        <h3>
                                            “ {!! $testimonial->description !!} ”
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="slider-button">
            <div class="testimonial-nav-prev"><i class="fas fa-chevron-left"></i></div>
            <div class="testimonial-nav-next"><i class="fas fa-chevron-right"></i></div>
        </div>
    </section>
@endsection