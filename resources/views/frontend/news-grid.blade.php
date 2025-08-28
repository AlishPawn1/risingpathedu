@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Blog grid',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Blogs', 'url' => url('/blogs')],
            ['label' => 'Blog grid'],
        ]
    ])
    @endcomponent

    <!--<< News Section Start >>-->
    <section class="news-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-box-items mt-0">
                        <div class="news-image">
                            <img src="{{ asset('assets/img/news/01.jpg') }}" alt="img">
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
                            <h3><a href="{{ url('news-details') }}">Navigating Borders Ultimate Guide to Visa Success</a></h3>
                            <p>
                                Transmds is the world’s driving worldwide coordinations supplier
                                we uphold.
                            </p>
                            <a href="{{ url('news-details') }}" class="link-btn">
                                <span>Read More</span> <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="news-box-items mt-0">
                        <div class="news-image">
                            <img src="{{ asset('assets/img/news/02.jpg') }}" alt="img">
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
                            <h3><a href="{{ url('news-details') }}">Unlocking Opportunities The Visa Journey Unveiled</a></h3>
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
                    <div class="news-box-items mt-0">
                        <div class="news-image">
                            <img src="{{ asset('assets/img/news/09.jpg') }}" alt="img">
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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-box-items mt-0">
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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="news-box-items mt-0">
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
                    <div class="news-box-items mt-0">
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
            </div>
        </div>
    </section>
@endsection