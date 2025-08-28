@extends('layouts.main.app')

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
                                                Kathmandu, Nepal, <br>
                                                Melbourne, Australia
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
                                            <a href="tel:+01368567894">+977 9849720101</a>
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
                                            <a href="https://modinatheme.com/cdn-cgi/l/email-protection#1970777f76597c61787469757c377a7674"
                                                class="link"><span class="__cf_email__"
                                                    data-cfemail="4f262129200f2a372e223f232a612c2022">[info@risingpathedu.com]</span></a>
                                            <br>
                                            <a href="https://modinatheme.com/cdn-cgi/l/email-protection#4e272028210e2b362f233e222b602d2123"
                                                class="link"><span class="__cf_email__"
                                                    data-cfemail="abc2c5cdc4ebced3cac6dbc7ce85c8c4c6">[info@risingpathedu.com]</span></a>
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
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
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
                            <form action="https://modinatheme.com/html/RisingPath-html/contact.php" id="contact-form"
                                method="POST">
                                <div class="row g-4">
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <input type="text" name="name" id="name" placeholder="Your Name*">
                                            <div class="icon">
                                                <i class="fal fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input type="text" name="email" id="email" placeholder="Email Address*">
                                            <div class="icon">
                                                <i class="fal fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
                                        <div class="form-clt">
                                            <textarea name="message" id="message"
                                                placeholder="Enter Your Messege here"></textarea>
                                            <div class="icon">
                                                <i class="fal fa-edit"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".8s">
                                        <button type="submit" class="theme-btn">
                                            <span><i class="fal fa-paper-plane"></i>Get In Touch</span>
                                        </button>
                                    </div>
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