@extends('layouts.main.app')

@section('content')
    <!--<< Hero Section Start >>-->
    <section class="hero-section hero-1">
        <div class="swiper-dot">
            <div class="dot"></div>
        </div>
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="shape-image" data-animation="fadeInLeft" data-delay="2.1s">
                        <img src="{{ asset('assets/img/hero/object1.png') }}" alt="shape-img">
                    </div>
                    <div class="shape-image-2 fadeInRight animated" data-animation="fadeInRight" data-delay="2.3s">
                        <img src="{{ asset('assets/img/hero/right-shape.png') }}" alt="shape-img">
                    </div>
                    <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/img/hero/hero-1.jpg') }}');"></div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <h6 data-animation="slideInRight" data-duration="2s" data-delay=".3s">Your Most
                                        Trusted Partners</h6>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Immigration & <br> Visa Consulting <br> Here...
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".7s">
                                        Transmds is the world’s driving worldwide coordinations supplier we uphold <br>
                                        industry and exchange the worldwide trade of merchandi
                                    </p>
                                    <div class="hero-button">
                                        <a href="{{ url('/') }}" class="theme-btn theme-color-2"
                                            data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s"><span>Learn More <i
                                                    class="fas fa-chevron-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="shape-image" data-animation="fadeInLeft" data-delay="2.1s">
                        <img src="assets/img/hero/object1.png" alt="shape-img">
                    </div>
                    <div class="shape-image-2 fadeInRight animated" data-animation="fadeInRight" data-delay="2.3s">
                        <img src="assets/img/hero/right-shape.png" alt="shape-img">
                    </div>
                    <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/img/hero/hero-2.jpg') }}');"></div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <h6 data-animation="slideInRight" data-duration="2s" data-delay=".3s">Your Most
                                        Trusted Partners</h6>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Immigration & <br> Visa Consulting <br> Here...
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".7s">
                                        Transmds is the world’s driving worldwide coordinations supplier we uphold <br>
                                        industry and exchange the worldwide trade of merchandi
                                    </p>
                                    <div class="hero-button">
                                        <a href="index.html" class="theme-btn theme-color-2"
                                            data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s"><span>Learn More <i
                                                    class="fas fa-chevron-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="shape-image" data-animation="fadeInLeft" data-delay="2.1s">
                        <img src="assets/img/hero/object1.png" alt="shape-img">
                    </div>
                    <div class="shape-image-2 fadeInRight animated" data-animation="fadeInRight" data-delay="2.3s">
                        <img src="assets/img/hero/right-shape.png" alt="shape-img">
                    </div>
                    <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/img/hero/hero-3.jpg') }}');"></div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <h6 data-animation="slideInRight" data-duration="2s" data-delay=".3s">Your Most
                                        Trusted Partners</h6>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Immigration & <br> Visa Consulting <br> Here...
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".7s">
                                        Transmds is the world’s driving worldwide coordinations supplier we uphold <br>
                                        industry and exchange the worldwide trade of merchandi
                                    </p>
                                    <div class="hero-button">
                                        <a href="index.html" class="theme-btn theme-color-2"
                                            data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s"><span>Learn More <i
                                                    class="fas fa-chevron-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="shape-image" data-animation="fadeInLeft" data-delay="2.1s">
                        <img src="assets/img/hero/object1.png" alt="shape-img">
                    </div>
                    <div class="shape-image-2 fadeInRight animated" data-animation="fadeInRight" data-delay="2.3s">
                        <img src="assets/img/hero/right-shape.png" alt="shape-img">
                    </div>
                    <div class="hero-image bg-cover" style="background-image: url('assets/img/hero/hero-2.jpg');"></div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <h6 data-animation="slideInRight" data-duration="2s" data-delay=".3s">Your Most
                                        Trusted Partners</h6>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Immigration & <br> Visa Consulting <br> Here...
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".7s">
                                        Transmds is the world’s driving worldwide coordinations supplier we uphold <br>
                                        industry and exchange the worldwide trade of merchandi
                                    </p>
                                    <div class="hero-button">
                                        <a href="index.html" class="theme-btn theme-color-2"
                                            data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s"><span>Learn More <i
                                                    class="fas fa-chevron-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                <span class="wow fadeInUp">About Company</span>
                                <h2 class="title-anim">
                                    Welcome to Experience Visa Consulting Firm
                                </h2>
                            </div>
                            <p class=" mt-4 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                Transmds is the world’s driving worldwide coordinations supplier — we uphold industry
                                and exchange the worldwide trade of merchandi
                            </p>
                            <div class="circle-progress-bar-wrapper">
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".3s">
                                    <div class="circle-bar" data-percent="68" data-duration="1000">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            Business <br>
                                            Strategy
                                        </h6>
                                    </div>
                                </div>
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".5s">
                                    <div class="circle-bar" data-percent="93" data-duration="1000">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            Real Technology <br>
                                            Solutions
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
    <section class="service-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Service We Provide</span>
                <h2 class="title-anim">
                    Explore Our Visa Citizenship <br>
                    & Immigration Services
                </h2>
            </div>
        </div>
        <div class="service-wrapper">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="service-card-items">
                        <h3><a href="{{ url('service-details') }}">Business Visa</a></h3>
                        <p>
                            Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                        </p>
                        <div class="service-thumb">
                            <img src="assets/img/service/01.jpg" alt="img">
                        </div>
                        <a href="service-details.html" class="link-btn">
                            <span>read more</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="service-card-items">
                        <h3><a href="service-details.html">Student Visa</a></h3>
                        <p>
                            Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                        </p>
                        <div class="service-thumb">
                            <img src="assets/img/service/02.jpg" alt="img">
                        </div>
                        <a href="service-details.html" class="link-btn">
                            <span>read more</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="service-card-items active">
                        <h3><a href="service-details.html">Work Visa</a></h3>
                        <p>
                            Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                        </p>
                        <div class="service-thumb">
                            <img src="assets/img/service/03.jpg" alt="img">
                        </div>
                        <a href="service-details.html" class="link-btn">
                            <span>read more</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="service-card-items">
                        <h3><a href="service-details.html">Touriest Visa</a></h3>
                        <p>
                            Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                        </p>
                        <div class="service-thumb">
                            <img src="assets/img/service/04.jpg" alt="img">
                        </div>
                        <a href="service-details.html" class="link-btn">
                            <span>read more</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Brand Section Start >>-->
    <!-- <div class="brand-section fix section-padding pt-0">
        <div class="container">
            <div class="brand-wrapper">
                <h6 class="text-center wow fadeInUp" data-wow-delay=".3s">1K+ BRANDS TRUST US</h6>
                <div class="brand-carousel-active">
                    <div class="brand-image">
                        <img src="assets/img/brand/01.png" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="assets/img/brand/01.png" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="assets/img/brand/01.png" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="assets/img/brand/01.png" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="assets/img/brand/01.png" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="assets/img/brand/01.png" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="assets/img/brand/01.png" alt="brand-img">
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!--<< Countries Section Start >>-->
    <section class="countries-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Countries we offer</span>
                <h2 class="title-anim">Countries We Support <br> for Immigration.</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="countries-card-items">
                        <div class="thumb">
                            <img src="assets/img/flag/japan.png" alt="img">
                        </div>
                        <div class="content">
                            <h3><a href="country-details.html">Japan </a></h3>
                            <p>Average time to resolve a
                                cyber.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="countries-card-items">
                        <div class="thumb">
                            <img src="assets/img/flag/canada.png" alt="img">
                        </div>
                        <div class="content">
                            <h3><a href="country-details.html">Canada </a></h3>
                            <p>Average time to resolve a
                                cyber.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="countries-card-items">
                        <div class="thumb">
                            <img src="assets/img/flag/aus.jpg" alt="img">
                        </div>
                        <div class="content">
                            <h3><a href="country-details.html">Australia </a></h3>
                            <p>Average time to resolve a
                                cyber.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="countries-card-items">
                        <div class="thumb">
                            <img src="assets/img/flag/us.png" alt="img">
                        </div>
                        <div class="content">
                            <h3><a href="country-details.html">United States </a></h3>
                            <p>Average time to resolve a
                                cyber.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="countries-card-items">
                        <div class="thumb">
                            <img src="assets/img/flag/uk.png" alt="img">
                        </div>
                        <div class="content">
                            <h3><a href="country-details.html">United Kingdom</a></h3>
                            <p>Average time to resolve a
                                cyber.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="countries-card-items">
                        <div class="thumb">
                            <img src="assets/img/flag/norway.png" alt="img">
                        </div>
                        <div class="content">
                            <h3><a href="country-details.html">Norway</a></h3>
                            <p>Average time to resolve a
                                cyber.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Cta Banner Section Start >>-->
    <div class="cta-banner-section bg-cover section-padding" style="background-image: url('assets/img/banner/01.jpg');">
        <div class="container">
            <div class="cta-banner-wrapper section-padding pt-0">
                <div class="video-box">
                    <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-buttton ripple video-popup">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--<< Feature Icon Box Section Start >>-->
    <section class="feature-icon-box-area">
        <div class="container">
            <div class="feature-icon-box-wrapper">
                <div class="row g-4">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="icon-box-items">
                            <div class="icon">
                                <i class="flaticon-passport-5"></i>
                            </div>
                            <div class="content">
                                <h3>Visa Process</h3>
                                <p>
                                    Sed perspiciatis undm nise este natus sit volutate
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="icon-box-items active">
                            <div class="icon">
                                <i class="flaticon-visa-2"></i>
                            </div>
                            <div class="content">
                                <h3>99% Visa Approvals</h3>
                                <p>
                                    Sed perspiciatis undm nise este natus sit volutate
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="icon-box-items">
                            <div class="icon">
                                <i class="flaticon-immigration-law"></i>
                            </div>
                            <div class="content">
                                <h3>Immigration</h3>
                                <p>
                                    Sed perspiciatis undm nise este natus sit volutate
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Team Section Start >>-->
    <section class="team-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Professional people</span>
                <h2 class="title-anim">
                    Meet Our Expert Visa <br> Consultants.
                </h2>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="team-box-items style-2">
                        <div class="team-image">
                            <img src="assets/img/team/1.png" alt="img">
                            <ul class="social-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3><a href="team-details.html">Devid Miller</a></h3>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="team-box-items">
                        <div class="team-image">
                            <img src="assets/img/team/1.png" alt="img">
                            <ul class="social-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3><a href="team-details.html">Ritu Ratia</a></h3>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="team-box-items style-2">
                        <div class="team-image">
                            <img src="assets/img/team/1.png" alt="img">
                            <ul class="social-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3><a href="team-details.html">Shikhon Islam</a></h3>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                    <div class="team-box-items">
                        <div class="team-image">
                            <img src="assets/img/team/1.png" alt="img">
                            <ul class="social-icon d-grid justify-content-center align-items-center">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3><a href="team-details.html">Sonsil Macron</a></h3>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<<Choose us section Start >>-->
    <section class="choose-us-section section-padding pt-0">
        <div class="container">
            <div class="choose-us-wrapper">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="choose-us-content">
                            <div class="section-title">
                                <span class="wow fadeInUp">Why Choose Us</span>
                                <h2 class="title-anim">Some Reasons People <br> Like Our Consultancy</h2>
                            </div>
                            <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">Transmds is the world’s driving
                                worldwide coordinations supplier <br> — we uphold industry and exchange the worldwide
                                trade of merchandi</p>
                            <div class="icon-box-items wow fadeInUp" data-wow-delay=".3s">
                                <div class="icon">
                                    <i class="flaticon-customer-service"></i>
                                </div>
                                <div class="content">
                                    <h3 class="mb-2">Direct Online Interviews</h3>
                                    <p>We are a dynamic and forward-thinking
                                        startup <br> dedicated to revolution</p>
                                </div>
                            </div>
                            <div class="icon-box-items wow fadeInUp" data-wow-delay=".5s">
                                <div class="icon">
                                    <i class="flaticon-immigration-law-2"></i>
                                </div>
                                <div class="content">
                                    <h3 class="mb-2">
                                        Quick & Easy Process</h3>
                                    <p>We are a dynamic and forward-thinking
                                        startup <br> dedicated to revolution</p>
                                </div>
                            </div>
                            <div class="icon-box-items wow fadeInUp" data-wow-delay=".3s">
                                <div class="icon">
                                    <i class="flaticon-document"></i>
                                </div>
                                <div class="content">
                                    <h3 class="mb-2">99% Visa Approvals</h3>
                                    <p>We are a dynamic and forward-thinking
                                        startup <br> dedicated to revolution</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="choose-us-image-items">
                            <div class="row g-4">
                                <div class="col-lg-7 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="choose-image-1">
                                        <img src="assets/img/choose-us/01.jpg" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="choose-image-2 bg-cover wow fadeInUp" data-wow-delay=".3s"
                                        style="background-image: url('assets/img/choose-us/02.jpg');"></div>
                                    <div class="choose-image-3 wow fadeInUp" data-wow-delay=".5s">
                                        <img src="assets/img/choose-us/03.jpg" alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="choose-box">
                                <h3>10m+ Trusted <br> Customer</h3>
                                <img src="assets/img/about/client.png" alt="author-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Counter Section Start >>-->
    <section class="counter-section section-padding section-bg">
        <div class="container">
            <div class="counter-wrapper">
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="counter-items text-center">
                            <div class="icon center">
                                <i class="flaticon-around"></i>
                            </div>
                            <div class="content">
                                <h2><span class="count">10</span>+</h2>
                                <p>
                                    Countries <br>
                                    Represented
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="counter-items text-center">
                            <div class="icon center">
                                <i class="flaticon-visa-2"></i>
                            </div>
                            <div class="content">
                                <h2><span class="count">853</span>+</h2>
                                <p>
                                    Completed <br>
                                    Visa Passport
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="counter-items text-center">
                            <div class="icon center">
                                <i class="flaticon-money"></i>
                            </div>
                            <div class="content">
                                <h2><span class="count">750</span>+</h2>
                                <p>
                                    Revenew <br>
                                    In per year
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                        <div class="counter-items text-center">
                            <div class="icon center">
                                <i class="flaticon-immigration-officer"></i>
                            </div>
                            <div class="content">
                                <h2><span class="count">20</span>+</h2>
                                <p>
                                    Experience <br>
                                    immigration officer
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Testimonial Section Start >>-->
    <section class="testimonial-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Our Testimonials</span>
                <h2 class="title-anim">
                    Let’s Explore Why People Say <br> About Our Services
                </h2>
            </div>
            <div class="testimonial-carousel-active">
                <div class="testimonial-card-items">
                    <div class="author-items">
                        <div class="author-image bg-cover"
                            style="background-image: url('assets/img/testimonial/1.png');"></div>
                        <div class="author-content">
                            <h5>Kawser Ahmed</h5>
                            <span>Web Developer</span>
                        </div>
                    </div>
                    <p>
                        creative agency, we believe in the Eid
                        and innovation. We are constantly melt
                        of what is possible, and strive to cat
                        only bea utiful and effective,but shark
                        inventore veritatis et quasi archite
                        cto beatae citae dicta sunt atlantic
                    </p>
                    <ul>
                        <li>January 23, 2024</li>
                    </ul>
                </div>
                <div class="testimonial-card-items">
                    <div class="author-items">
                        <div class="author-image bg-cover"
                            style="background-image: url('assets/img/testimonial/1.png');"></div>
                        <div class="author-content">
                            <h5>Jhon Dev</h5>
                            <span>UI Designer</span>
                        </div>
                    </div>
                    <p>
                        creative agency, we believe in the Eid
                        and innovation. We are constantly melt
                        of what is possible, and strive to cat
                        only bea utiful and effective,but shark
                        inventore veritatis et quasi archite
                        cto beatae citae dicta sunt atlantic
                    </p>
                    <ul>
                        <li>January 23, 2024</li>
                    </ul>
                </div>
                <div class="testimonial-card-items">
                    <div class="author-items">
                        <div class="author-image bg-cover"
                            style="background-image: url('assets/img/testimonial/1.png');"></div>
                        <div class="author-content">
                            <h5>Salman Ahmed</h5>
                            <span>WordPress Developer</span>
                        </div>
                    </div>
                    <p>
                        creative agency, we believe in the Eid
                        and innovation. We are constantly melt
                        of what is possible, and strive to cat
                        we pride ourselve on delivering
                    </p>
                    <ul>
                        <li>May 15, 2023</li>
                    </ul>
                </div>
                <div class="testimonial-card-items">
                    <div class="author-items">
                        <div class="author-image bg-cover"
                            style="background-image: url('assets/img/testimonial/1.png');"></div>
                        <div class="author-content">
                            <h5>Shikon Islam</h5>
                            <span>Frontend Engineer</span>
                        </div>
                    </div>
                    <p>
                        creative agency, we believe in the Eid
                        and innovation. We are constantly melt
                        of what is possible, and strive to cat
                        only bea utiful and effective,but shark
                        inventore veritatis et quasi archite
                        cto beatae citae dicta sunt atlantic
                    </p>
                    <ul>
                        <li>January 23, 2024</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--<< Cta Chat Section Start >>-->
    <section class="cta-chat-section section-padding pt-0">
        <div class="container">
            <div class="cta-chat-wrapper">
                <div class="chat-items wow fadeInUp" data-wow-delay=".3s">
                    <div class="icon">
                        <i class="flaticon-chat"></i>
                    </div>
                    <div class="content">
                        <h3>Let’s Discuss & Start Visa Consultations</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur notted adipisicin</p>
                    </div>
                </div>
                <a href="contact.html" class="theme-btn bg-white wow fadeInUp" data-wow-delay=".5s">
                    <span>
                        Lets Get Started
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!--<< News Section Start >>-->
    <section class="process-work-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Working Process</span>
                <h2 class="title-anim">4 Step Follow You Can Get <br>
                    Your Visa Easily</h2>
            </div>
            <div class="process-work-wrapper">
                <div class="line-shape">
                    <img src="assets/img/linepng.png" alt="img">
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="work-process-items text-center">
                            <div class="icon">
                                <i class="flaticon-passport-5"></i>
                                <h6 class="number">
                                    1
                                </h6>
                            </div>
                            <div class="content">
                                <h4>Choose A Service</h4>
                                <p>
                                    In a free hour, when our power of choice is untrammeled and
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="work-process-items text-center">
                            <div class="content style-2">
                                <h4>Documents and Payments</h4>
                                <p>
                                    In a free hour, when our power of choice is untrammeled and
                                </p>
                            </div>
                            <div class="icon">
                                <i class="flaticon-money"></i>
                                <h6 class="number">
                                    2
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                        <div class="work-process-items text-center">
                            <div class="icon">
                                <i class="flaticon-customer-service"></i>
                                <h6 class="number">
                                    3
                                </h6>
                            </div>
                            <div class="content">
                                <h4>Request A Meeting</h4>
                                <p>
                                    In a free hour, when our power of choice is untrammeled and
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                        <div class="work-process-items text-center">
                            <div class="content style-2">
                                <h4>Receive your Visa Now</h4>
                                <p>
                                    In a free hour, when our power of choice is untrammeled and
                                </p>
                            </div>
                            <div class="icon">
                                <i class="flaticon-visa"></i>
                                <h6 class="number">
                                    4
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Contact Section Start >>-->
    <section class="contact-section-one fix">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-left">
                            <div class="contact-bg bg-cover"
                                style="background-image: url('assets/img/contact/01.jpg');"></div>
                            <div class="contact-shape" style="background-image: url(assets/img/contact/bg-shape.png);">
                            </div>
                            <div class="section-title">
                                <span class="text-white">Contact us</span>
                                <h2 class="text-white title-anim">Get a Call Back</h2>
                            </div>
                            <form action="#" id="contact-form" method="POST" class="mt-4 mt-md-0">
                                <div class="row g-3">
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <input type="text" name="name" id="name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <input type="text" name="email" id="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input type="text" name="phone" id="phone" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <div class="nice-select open" tabindex="0">
                                                <span class="current">
                                                    Choose Services
                                                </span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected focus">
                                                        Default sorting
                                                    </li>
                                                    <li data-value="1" class="option">
                                                        Sort by popularity
                                                    </li>
                                                    <li data-value="1" class="option">
                                                        Sort by average rating
                                                    </li>
                                                    <li data-value="1" class="option">
                                                        Sort by latest
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <textarea name="message" id="message"
                                                placeholder="Write Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                                        <button type="submit" class="theme-btn">
                                            <span>
                                                Send Us Messages
                                                <i class="fas fa-chevron-right"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-right">
                            <div class="google-map-box">
                                <iframe
                                    src="https://maps.google.com/maps?q=Putalisadak%2C%20Kathmandu%2044600&z=16&output=embed"
                                    width="100%"
                                    height="450"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="Map: Putalisadak, Kathmandu">
                                    </iframe>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< News Section Start >>-->
    <!-- <section class="news-section fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">News & Blog</span>
                <h2 class="title-anim">Read Our Latest News & Blog</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-box-items">
                        <div class="news-image">
                            <img src="assets/img/news/01.jpg" alt="img">
                            <img src="assets/img/news/01.jpg" alt="img">
                            <h6 class="date">26 <span>Nov</span></h6>
                        </div>
                        <div class="news-content">
                            <ul class="post-date">
                                <li>
                                    <i class="far fa-user-circle"></i>
                                    Shikhon .H
                                </li>
                                <li>
                                    <i class="fal fa-comments"></i>
                                    Comments (03)
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Navigating Borders Ultimate Guide to Visa Success</a></h3>
                            <p>
                                Transmds is the world’s driving worldwide coordinations supplier
                                we uphold.
                            </p>
                            <a href="news-details.html" class="link-btn">
                                <span>Read More</span> <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="news-box-items">
                        <div class="news-image">
                            <img src="assets/img/news/02.jpg" alt="img">
                            <img src="assets/img/news/02.jpg" alt="img">
                            <h6 class="date">11 <span>Dec</span></h6>
                        </div>
                        <div class="news-content">
                            <ul class="post-date">
                                <li>
                                    <i class="far fa-user-circle"></i>
                                    Shikhon .H
                                </li>
                                <li>
                                    <i class="fal fa-comments"></i>
                                    Comments (03)
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Unlocking Opportunities The Visa Journey Unveiled</a></h3>
                            <p>
                                Transmds is the world’s driving worldwide coordinations supplier
                                we uphold.
                            </p>
                            <a href="news-details.html" class="link-btn">
                                <span>Read More</span> <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="news-box-items">
                        <div class="news-image">
                            <img src="assets/img/news/09.jpg" alt="img">
                            <img src="assets/img/news/09.jpg" alt="img">
                            <h6 class="date">27 <span>Sep</span></h6>
                        </div>
                        <div class="news-content">
                            <ul class="post-date">
                                <li>
                                    <i class="far fa-user-circle"></i>
                                    Shikhon .H
                                </li>
                                <li>
                                    <i class="fal fa-comments"></i>
                                    Comments (03)
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Navigating Borders Ultimate Guide to Visa Success</a></h3>
                            <p>
                                Transmds is the world’s driving worldwide coordinations supplier
                                we uphold.
                            </p>
                            <a href="news-details.html" class="link-btn">
                                <span>Read More</span> <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

@endsection
