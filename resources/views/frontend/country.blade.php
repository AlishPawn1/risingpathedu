@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Country',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Country'],
        ]
    ])
    @endcomponent

    <!--<< Countries Section Start >>-->
    <section class="countries-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                @foreach ($countries->where('is_active', 1)->take(6) as $country)
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
        </div>
    </section>

    <!--<< Case Studies Start >>-->
    <div class="marque-section">
        <div class="marquee-wrapper text-slider style-height">
            <div class="marquee-inner to-left">
                <ul class="marqee-list d-flex">
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Visa Processing</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Help in Documentation</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Immigrations</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Travel Partners</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Tours & Travel Agency</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Visa Processing</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Help in Documentation</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Immigrations</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Travel Partners</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Tours & Travel Agency</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--<< Country Section Start >>-->
    <section class="country-section fix section-padding section-bg-3 bg-cover"
        style="background-image: url('{{ asset('assets/img/flag/lines-waves1.png') }}');">
        <div class="container">
            <div class="row g-4">
                @foreach ($countries->where('is_active', 1)->skip(6)->take(4) as $country)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.3 + (0.2 * $loop->index) }}s">
                        <div class="country-box-items mt-0">
                            <div class="flag-thumb">
                                <img src="{{ asset('storage/' . $country->flag) }}" alt="{{ $country->name }}">
                            </div>
                            <div class="flag-content">
                                <h3><a href="{{ route('countries.show', $country->slug) }}">{{ $country->name }}</a></h3>
                                <p>{{ Str::limit($country->short_text, 50) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--<< Case Studies Start >>-->
    <div class="marque-section">
        <div class="marquee-wrapper text-slider style-height">
            <div class="marquee-inner to-right">
                <ul class="marqee-list d-flex">
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Visa Processing</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Help in Documentation</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Immigrations</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Travel Partners</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Tours & Travel Agency</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Visa Processing</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Help in Documentation</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Immigrations</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Travel Partners</span>
                    </li>
                    <li class="marquee-item style-2">
                        <span class="text-slider"><i class="fas fa-plane"></i></span><span
                            class="text-slider text-style">Tours & Travel Agency</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--<< Country Section Start >>-->
    <section class="country-section-4 fix section-padding">
        <div class="container">
            <div class="swiper flag-slider">
                <div class="swiper-wrapper">
                    @foreach ($countries->where('is_active', 1) as $country)
                        <div class="swiper-slide">
                            <div class="country-box-items style-2 mt-0">
                                <div class="flag-thumb">
                                    <img src="{{ asset('storage/' . $country->flag) }}" alt="{{ $country->name }}">
                                </div>
                                <div class="flag-content">
                                    <h3><a href="{{ route('countries.show', $country->slug) }}">{{ $country->name }}</a></h3>
                                    <p>{{ Str::limit($country->short_text, 50) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


@endsection