@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Teams',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Teams'],
        ]
    ])
    @endcomponent

    <!--<< Team Section Start >>-->
    <section class="team-section section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/team/01.jpg') }}" alt="team-img">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center box-shadow">
                            <h5>
                                <a href="{{ url('team-details') }}">Salman Ahmed</a>
                            </h5>
                            <p>CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/team/02.jpg') }}" alt="team-img">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center box-shadow">
                            <h5>
                                <a href="{{ url('team-details') }}">Sonsil Macron</a>
                            </h5>
                            <p>CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/team/03.jpg') }}" alt="team-img">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center box-shadow">
                            <h5>
                                <a href="{{ url('team-details') }}">Kawser Ahmed</a>
                            </h5>
                            <p>CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/team/04.jpg') }}" alt="team-img">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center box-shadow">
                            <h5>
                                <a href="{{ url('team-details') }}">Sara Albert</a>
                            </h5>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="assets/img/team/04.jpg" alt="team-img">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center box-shadow">
                            <h5>
                                <a href="team-details.html">Sara Albert</a>
                            </h5>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="assets/img/team/03.jpg" alt="team-img">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center box-shadow">
                            <h5>
                                <a href="team-details.html">Kawser Ahmed</a>
                            </h5>
                            <p>CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="assets/img/team/02.jpg" alt="team-img">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center box-shadow">
                            <h5>
                                <a href="team-details.html">Sonsil Macron</a>
                            </h5>
                            <p>CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="assets/img/team/01.jpg" alt="team-img">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center box-shadow">
                            <h5>
                                <a href="team-details.html">Salman Ahmed</a>
                            </h5>
                            <p>CEO & Founder</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection