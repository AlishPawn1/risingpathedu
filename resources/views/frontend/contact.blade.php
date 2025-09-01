@extends('layouts.main.app')

@props(['formType' => 'middle'])
@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Contact Us',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Contact Us'],
        ]
    ])
    @endcomponent


    <!--<< Contact Section Start >>-->
    <section class="contact-main-area fix section-padding">
        <div class="container">
            <div class="contact-main-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <div class="section-title mb-2">
                                <span class="wow fadeInUp">Get In Touch</span>
                                <h2 class="title-anim">Contact Us</h2>
                            </div>
                            <p class="mt-4 mt-md-0 wow fadeInUp" data-wow-delay=".4s">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem aperiam, eaque inventore
                            </p>
                            <div class="row g-4 mt-3">
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="info-items">
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="content">
                                            <h5>Location</h5>
                                            <p>
                                                {{ optional($siteSetting)->location ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="info-items">
                                        <div class="icon">
                                            <i class="far fa-phone"></i>
                                        </div>
                                        <div class="content">
                                            <h5>Phone</h5>
                                            <a href="tel:+09354587874">01 ******* </a> <br>
                                            @if(!empty(optional($siteSetting)->contact_number))
                                                <a
                                                    href="tel:{{ optional($siteSetting)->contact_number ?? '' }}">{{ optional($siteSetting)->contact_number ?? '' }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="info-items">
                                        <div class="icon">
                                            <i class="fal fa-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <h5>Email</h5>
                                            @if(!empty(optional($siteSetting)->email))
                                                <a
                                                    href="mailto:{{ optional($siteSetting)->email }}">{{ optional($siteSetting)->email }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".9s">
                                    <div class="info-items">
                                        <div class="icon">
                                            <i class="fas fa-share-alt"></i>
                                        </div>
                                        <div class="content">
                                            <h5>Social</h5>
                                            <div class="social-icon d-flex align-items-center">
                                                @if(!empty(optional($siteSetting)->facebook))
                                                    <a href="{{ optional($siteSetting)->facebook }}" target="_blank"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                @endif
                                                @if(!empty(optional($siteSetting)->twitter))
                                                    <a href="{{ optional($siteSetting)->twitter }}" target="_blank"><i
                                                            class="fab fa-twitter"></i></a>
                                                @endif
                                                @if(!empty(optional($siteSetting)->youtube))
                                                    <a href="{{ optional($siteSetting)->youtube }}" target="_blank"><i
                                                            class="fab fa-youtube"></i></a>
                                                @endif
                                                @if(!empty(optional($siteSetting)->linkedin))
                                                    <a href="{{ optional($siteSetting)->linkedin }}" target="_blank"><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                @endif
                                                @if(!empty(optional($siteSetting)->instagram))
                                                    <a href="{{ optional($siteSetting)->instagram }}" target="_blank"><i
                                                            class="fab fa-instagram"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-image wow fadeInUp" data-wow-delay=".4s">
                                <img src="{{ asset('assets/img/contact.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="contact-form-items">
                            <div class="contact-title">
                                <h3 class="wow fadeInUp" data-wow-delay=".3s">Fill Up The Form</h3>
                                <p class="wow fadeInUp" data-wow-delay=".5s">Your email address will not be published.
                                    Required fields are marked *</p>
                            </div>
                            <form action="{{ route('contact.store') }}" method="POST" id="contact-form" class="row g-4">
                                @csrf
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <input type="text" name="name" id="name" placeholder="Your Name*" required>
                                        <div class="icon"><i class="fal fa-user"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <input type="email" name="email" id="email" placeholder="Email Address*" required>
                                        <div class="icon"><i class="fal fa-envelope"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="form-clt">
                                        <textarea name="message" id="message" placeholder="Enter Your Messege here"
                                            required></textarea>
                                        <div class="icon"><i class="fal fa-edit"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".8s">
                                    <button type="submit" class="theme-btn">
                                        <span><i class="fal fa-paper-plane"></i>Get In Touch</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Map Section Start >>-->
    <div class="map-section">
        <div class="google-map wow fadeInUp" data-wow-delay=".7s">
            <iframe src="https://maps.google.com/maps?q=Putalisadak%2C%20Kathmandu%2044600&z=16&output=embed" width="100%"
                height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                title="Map: Putalisadak, Kathmandu">
            </iframe>
        </div>
    </div>
@endsection