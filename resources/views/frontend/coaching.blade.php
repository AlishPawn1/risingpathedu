@extends('layouts.main.app')
@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Coaching',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Coaching'],
        ]
    ])
    @endcomponent

    <!--<< Coaching Section Start >>-->
    <section class="coaching-section fix section-padding section-bg">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="coaching-card-items">
                        <div class="coacing-image">
                            <img src="{{ asset('assets/img/coaching/01.jpg') }}" alt="img">
                        </div>
                        <div class="icon">
                            <i class="flaticon-mortarboard"></i>
                        </div>
                        <div class="content text-center">
                            <h3><a href="{{ url('coaching-details') }}">IELTS Courses</a></h3>
                            <p>
                                Sit amet conse bestibulume
                                ullamcorper nulla amet
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="coaching-card-items">
                        <div class="coacing-image">
                            <img src="{{ asset('assets/img/coaching/02.jpg') }}" alt="img">
                        </div>
                        <div class="icon">
                            <i class="flaticon-graduated"></i>
                        </div>
                        <div class="content text-center">
                            <h3><a href="{{ url('coaching-details') }}">Citizenship Test</a></h3>
                            <p>
                                Sit amet conse bestibulume
                                ullamcorper nulla amet
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="coaching-card-items active">
                        <div class="coacing-image">
                            <img src="{{ asset('assets/img/coaching/03.jpg') }}" alt="img">
                        </div>
                        <div class="icon">
                            <i class="flaticon-plane-ticket"></i>
                        </div>
                        <div class="content text-center">
                            <h3><a href="{{ url('coaching-details') }}">TOFEL Coaching</a></h3>
                            <p>
                                Sit amet conse bestibulume
                                ullamcorper nulla amet
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="coaching-card-items">
                        <div class="coacing-image">
                            <img src="{{ asset('assets/img/coaching/04.jpg') }}" alt="img">
                        </div>
                        <div class="icon">
                            <i class="flaticon-airplane-2"></i>
                        </div>
                        <div class="content text-center">
                            <h3><a href="{{ url('coaching-details') }}">OET Coaching</a></h3>
                            <p>
                                Sit amet conse bestibulume
                                ullamcorper nulla amet
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Coaching Section Start >>-->
    <section class="coaching-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="coaching-box-items mt-0">
                        <div class="coaching-image">
                            <img src="{{ asset('assets/img/coaching/05.jpg') }}" alt="img">
                            <img src="assets/img/coaching/05.jpg" alt="img">
                            <a href="{{ url('coaching-details') }}" class="image-overlay">
                                <i class="fal fa-plus"></i>
                            </a>
                            <h5 class="price">$170</h5>
                        </div>
                        <div class="content">
                            <h4><a href="{{ url('coaching-details') }}">IELTS Course</a></h4>
                            <p>
                                We approached WiaTech with
                                complex project deliver
                            </p>
                            <a href="{{ url('coaching-details') }}" class="link-btn link-btn-2">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="coaching-box-items mt-0">
                        <div class="coaching-image">
                            <img src="{{ asset('assets/img/coaching/06.jpg') }}" alt="img">
                            <img src="assets/img/coaching/06.jpg" alt="img">
                            <a href="{{ url('coaching-details') }}" class="image-overlay">
                                <i class="fal fa-plus"></i>
                            </a>
                            <h5 class="price">$170</h5>
                        </div>
                        <div class="content">
                            <h4><a href="{{ url('coaching-details') }}">PTE Course</a></h4>
                            <p>
                                We approached WiaTech with
                                complex project deliver
                            </p>
                            <a href="{{ url('coaching-details') }}" class="link-btn link-btn-2">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="coaching-box-items mt-0">
                        <div class="coaching-image">
                            <img src="{{ asset('assets/img/coaching/07.jpg') }}" alt="img">
                            <img src="assets/img/coaching/07.jpg" alt="img">
                            <a href="{{ url('coaching-details') }}" class="image-overlay">
                                <i class="fal fa-plus"></i>
                            </a>
                            <h5 class="price">$170</h5>
                        </div>
                        <div class="content">
                            <h4><a href="{{ url('coaching-details') }}">TOEFL Course</a></h4>
                            <p>
                                We approached WiaTech with
                                complex project deliver
                            </p>
                            <a href="{{ url('coaching-details') }}" class="link-btn link-btn-2">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="coaching-box-items mt-0">
                        <div class="coaching-image">
                            <img src="{{ asset('assets/img/coaching/08.jpg') }}" alt="img">
                            <img src="assets/img/coaching/08.jpg" alt="img">
                            <a href="{{ url('coaching-details') }}" class="image-overlay">
                                <i class="fal fa-plus"></i>
                            </a>
                            <h5 class="price">$170</h5>
                        </div>
                        <div class="content">
                            <h4><a href="{{ url('coaching-details') }}">GRE Course</a></h4>
                            <p>
                                We approached WiaTech with
                                complex project deliver
                            </p>
                            <a href="{{ url('coaching-details') }}" class="link-btn link-btn-2">
                                <span>read more</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Coaching Section Start >>-->
    <section class="coaching-section fix section-bg section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="coaching-box-items-2 mt-0">
                        <div class="coaching-image">
                            <img src="{{ asset('assets/img/coaching/01.jpg') }}" alt="img">
                        </div>
                        <div class="coaching-content">
                            <h3><a href="{{ url('coaching-details') }}">IELTS Courses</a></h3>
                            <p>
                                At Tech Genius Solution we understand that business
                                has unique IT needs offer a comprehensive
                            </p>
                            <a href="{{ url('news-details') }}" class="link-btn mt-2 d-inline-block">
                                Read More<i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="coaching-box-items-2 mt-0">
                        <div class="coaching-image">
                            <img src="{{ asset('assets/img/coaching/02.jpg') }}" alt="img">
                        </div>
                        <div class="coaching-content">
                            <h3><a href="{{ url('coaching-details') }}">Citizenship Test</a></h3>
                            <p>
                                At Tech Genius Solution we understand that business
                                has unique IT needs offer a comprehensive
                            </p>
                            <a href="{{ url('news-details') }}" class="link-btn mt-2 d-inline-block">
                                Read More<i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="coaching-box-items-2 mt-0">
                        <div class="coaching-image">
                            <img src="assets/img/coaching/03.jpg" alt="img">
                        </div>
                        <div class="coaching-content">
                            <h3><a href="coaching-details.html">TOFEL Coaching</a></h3>
                            <p>
                                At Tech Genius Solution we understand that business
                                has unique IT needs offer a comprehensive
                            </p>
                            <a href="news-details.html" class="link-btn mt-2 d-inline-block">
                                Read More<i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="coaching-box-items-2 mt-0">
                        <div class="coaching-image">
                            <img src="assets/img/coaching/04.jpg" alt="img">
                        </div>
                        <div class="coaching-content">
                            <h3><a href="coaching-details.html">OET Coaching</a></h3>
                            <p>
                                At Tech Genius Solution we understand that business
                                has unique IT needs offer a comprehensive
                            </p>
                            <a href="news-details.html" class="link-btn mt-2 d-inline-block">
                                Read More<i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection