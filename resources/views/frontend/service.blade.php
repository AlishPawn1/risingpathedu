@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Visa Details',
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
                <div class="service-box-items style-2 wow fadeInUp" data-wow-delay=".3s">
                    <div class="icon">
                        <i class="flaticon-workers"></i>
                    </div>
                    <div class="content">
                        <h6>
                            <a href="{{ url('service-details') }}">
                                Working Visa
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="service-box-items style-2 active wow fadeInUp" data-wow-delay=".5s">
                    <div class="icon">
                        <i class="flaticon-traveller"></i>
                    </div>
                    <div class="content">
                        <h6>
                            <a href="service-details.html">
                                Tourist Visa
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="service-box-items style-2 wow fadeInUp" data-wow-delay=".7s">
                    <div class="icon">
                        <i class="flaticon-passport-16"></i>
                    </div>
                    <div class="content">
                        <h6>
                            <a href="service-details.html">
                                Medical Visa
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="service-box-items style-2 wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon">
                        <i class="flaticon-graduated"></i>
                    </div>
                    <div class="content">
                        <h6>
                            <a href="service-details.html">
                                Student Visa
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="service-box-items style-2 wow fadeInUp" data-wow-delay=".9s">
                    <div class="icon">
                        <i class="flaticon-passport"></i>
                    </div>
                    <div class="content">
                        <h6>
                            <a href="service-details.html">
                                Family Visa
                            </a>
                        </h6>
                    </div>
                </div>
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
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="service-card-items mt-0">
                            <h3><a href="{{ url('service-details') }}">Business Visa</a></h3>
                            <p>
                                Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                            </p>
                            <div class="service-thumb">
                                <img src="{{ asset('assets/img/service/01.jpg') }}" alt="img">
                            </div>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="service-card-items mt-0">
                            <h3><a href="{{ url('service-details') }}">Student Visa</a></h3>
                            <p>
                                Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                            </p>
                            <div class="service-thumb">
                                <img src="{{ asset('assets/img/service/02.jpg') }}" alt="img">
                            </div>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="service-card-items active mt-0">
                            <h3><a href="{{ url('service-details') }}">Work Visa</a></h3>
                            <p>
                                Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                            </p>
                            <div class="service-thumb">
                                <img src="{{ asset('assets/img/service/03.jpg') }}" alt="img">
                            </div>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="service-card-items mt-0">
                            <h3><a href="{{ url('service-details') }}">Touriest Visa</a></h3>
                            <p>
                                Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                            </p>
                            <div class="service-thumb">
                                <img src="{{ asset('assets/img/service/04.jpg') }}" alt="img">
                            </div>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="service-card-items mt-0">
                            <h3><a href="{{ url('service-details') }}">Business Visa</a></h3>
                            <p>
                                Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                            </p>
                            <div class="service-thumb">
                                <img src="{{ asset('assets/img/service/01.jpg') }}" alt="img">
                            </div>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="service-card-items mt-0">
                            <h3><a href="{{ url('service-details') }}">Student Visa</a></h3>
                            <p>
                                Sit amet consectetur bestibulu ullamcorer arcustulla amet dolor tortor elementum
                            </p>
                            <div class="service-thumb">
                                <img src="{{ asset('assets/img/service/02.jpg') }}" alt="img">
                            </div>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="service-visa-items">
                        <div class="service-visa-thumb">
                            <img src="{{ asset('assets/img/visa/01.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/visa/01.jpg') }}" alt="img">
                            <a href="{{ url('service-details') }}" class="image-overlay">
                                <i class="fal fa-plus"></i>
                            </a>
                        </div>
                        <div class="service-visa-content">
                            <h3><a href="{{ url('service-details') }}">Student Visa</a></h3>
                            <p>
                                Quis autem vel eum iure reprehenderit quin eaes voluptate velit esse quam
                            </p>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-visa-items">
                        <div class="service-visa-thumb">
                            <img src="{{ asset('assets/img/visa/02.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/visa/02.jpg') }}" alt="img">
                            <a href="{{ url('service-details') }}" class="image-overlay">
                                <i class="fal fa-plus"></i>
                            </a>
                        </div>
                        <div class="service-visa-content">
                            <h3><a href="{{ url('service-details') }}">business Visa</a></h3>
                            <p>
                                Quis autem vel eum iure reprehenderit quin eaes voluptate velit esse quam
                            </p>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="service-visa-items">
                        <div class="service-visa-thumb">
                            <img src="{{ asset('assets/img/visa/03.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/visa/03.jpg') }}" alt="img">
                            <a href="{{ url('service-details') }}" class="image-overlay">
                                <i class="fal fa-plus"></i>
                            </a>
                        </div>
                        <div class="service-visa-content">
                            <h3><a href="{{ url('service-details') }}">Tourist Visa</a></h3>
                            <p>
                                Quis autem vel eum iure reprehenderit quin eaes voluptate velit esse quam
                            </p>
                            <a href="{{ url('service-details') }}" class="link-btn">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
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
                                style="background-image: url('{{ asset('assets/img/contact/01.jpg') }}');">
                            </div>
                            <div class="contact-shape"
                                style="background-image: url({{ asset('assets/img/contact/bg-shape.png') }});">
                            </div>
                            <div class="section-title">
                                <span class="text-white wow fadeInUp">Contact us</span>
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
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade" title="Map: Putalisadak, Kathmandu">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection