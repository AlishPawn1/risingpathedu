@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Visa',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Service'],
        ]
    ])
    @endcomponent

    <!--<< Service Section Start >>-->
    <section class="service-section section-bg-4 fix section-padding">
        <div class="container">
            <div class="title-section-area">
                <div class="section-title">
                    <span class="wow fadeInUp">Visa Categories</span>
                    <h2 class="title-anim">
                        Outstanding Immigration <br> Visa Services.
                    </h2>
                </div>
                <p class="wow fadeInUp" data-wow-delay=".5s">
                    Transmds is the world’s driving worldwide coordinations supplier <br> uphold industry and exchange the
                    worldwide trade of merchandi <br>
                    do eiusmod tempor incididunt ut labore et simply free text dolore
                </p>
            </div>
            <div class="service-wrapper-3">
                @foreach ($services as $index => $service)
                    <div class="service-box-items style-2 wow fadeInUp" data-wow-delay="{{ 0.2 * ($index + 3) }}s">
                        <div class="icon">
                            <img src="{{ $service->icon ? asset('storage/' . $service->icon) : asset('assets/img/backfall-user.png') }}"
                                alt="{{ $service->title }} Icon">
                        </div>
                        <div class="content">
                            <h6>
                                <a href="{{ url('service/' . $service->slug) }}">
                                    {{ $service->title }}
                                </a>
                            </h6>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="service-text-area text-center mt-5 wow fadeInUp" data-wow-delay=".4s">
                <h5>
                    Bring them together and you overcome the ordinary.
                    <a href="{{ url('service') }}" class="link-btn link-btn-2">
                        <span>View More Service</span>
                        <i class="fal fa-plus"></i>
                    </a>
                </h5>
            </div>
        </div>
    </section>

    <!--<< Service Section Start >>-->
    <section class="service-section fix section-padding">
        <div class="container">
            <div class="service-wrapper p-0">
                <div class="row g-4">
                    @foreach ($services as $index => $service)
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 * $index }}s">
                            <div class="service-card-items {{ $index == 2 ? 'active' : '' }}">
                                <div>
                                    <h3><a href="{{ url('service/' . $service->slug) }}">{{ $service->title }}</a></h3>
                                    <p>
                                        {{ Str::limit($service->short_description, 50) }}
                                    </p>
                                </div>
                                <div>
                                    <div class="service-thumb">
                                        <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/img/backfall-user.png') }}"
                                            alt="{{ $service->title }}">
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
                        {{ $services->links('vendor.pagination.custom') }}
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
                <span class="wow fadeInUp">Service We Provide</span>
                <h2 class="title-anim">Explore Our Visa Citizenship & <br> Immigration Services</h2>
            </div>
            <div class="row">
                @foreach ($services->take(3) as $index => $service)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 * $index }}s">
                        <div class="service-visa-items">
                            <div class="service-visa-thumb">
                                <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/img/backfall-user.png') }}"
                                    alt="{{ $service->title }}">
                                <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/img/backfall-user.png') }}"
                                    alt="{{ $service->title }}">
                                <a href="{{ url('service/' . $service->slug) }}" class="image-overlay">
                                    <i class="fal fa-plus"></i>
                                </a>
                            </div>
                            <div class="service-visa-content">
                                <h3><a href="{{ url('service/' . $service->slug) }}">{{ $service->title }}</a></h3>
                                <p>
                                    {{ Str::limit($service->short_description, 50) }}
                                </p>
                                <a href="{{ url('service/' . $service->slug) }}" class="link-btn">
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