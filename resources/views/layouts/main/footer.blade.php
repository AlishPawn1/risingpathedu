<!--<< Footer Section Start >>-->
<footer class="footer-section footer-bg">
    <div class="container">
        <div class="footer-widgets-wrapper">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="/">
                                <img src="{{ optional($siteSetting)->footer_logo ? asset('storage/' . $siteSetting->footer_logo) : asset('assets/img/logo/footer-logo.svg') }}"
                                    alt="footer-logo">
                            </a>
                        </div>
                        <div class="footer-content">
                            @if(!empty(optional($siteSetting)->footer_text))
                                <p>{{ optional($siteSetting)->footer_text }}</p>
                            @endif
                            @if(!empty(optional($siteSetting)->email))
                                <a href="mailto:{{ optional($siteSetting)->email ?? '' }}" class="link">{{ optional($siteSetting)->email ?? '' }}</a>
                            @endif
                            <div class="social-icon d-flex align-items-center">
                                @if(!empty(optional($siteSetting)->facebook))
                                    <a href="{{ optional($siteSetting)->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if(!empty(optional($siteSetting)->twitter))
                                    <a href="{{ optional($siteSetting)->twitter }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if(!empty(optional($siteSetting)->youtube))
                                    <a href="{{ optional($siteSetting)->youtube }}"><i class="fab fa-youtube"></i></a>
                                @endif
                                @if(!empty(optional($siteSetting)->linkedin))
                                    <a href="{{ optional($siteSetting)->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if(!empty(optional($siteSetting)->instagram))
                                    <a href="{{ optional($siteSetting)->instagram }}"><i class="fab fa-instagram"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 ps-lg-5 col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Explore</h5>
                        </div>
                        <ul class="list-items">
                            <li><a href="/about">About</a></li>
                            <li><a href="/team">Meet Experts</a></li>
                            <li><a href="/news">News & Media</a></li>
                            <li><a href="/services">services</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 ps-lg-4 col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Visa</h5>
                        </div>
                        <ul class="list-items">
                            @foreach($allCourse->take(5) as $course)
                                <li>
                                    <a href="{{ route('courses.show', $course->slug) }}">
                                        {{ $course->name }}
                                        <span><i class="fas fa-chevron-right"></i></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Address</h5>
                        </div>
                        <div class="footer-address-text">
                            @if(!empty(optional($siteSetting)->location))
                                <p>{{ optional($siteSetting)->location }}</p>
                            @endif
                            @if(!empty(optional($siteSetting)->business_hours))
                                <h5>Hours:</h5>
                                <p>{{ optional($siteSetting)->business_hours }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 ps-xl-5 col-sm-6 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".9s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Instagram</h5>
                        </div>
                        <div class="footer-gallery">
                            <div class="gallery-wrap">
                                <div class="gallery-item">
                                    <div class="thumb">
                                        <a href="{{ asset('assets/img/footer/gallery-1.jpg') }}" class="img-popup">
                                            <img src="{{ asset('assets/img/footer/gallery-1.jpg') }}" alt="gallery-img">
                                            <div class="icon">
                                                <i class="far fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="{{ asset('assets/img/footer/gallery-2.jpg') }}" class="img-popup">
                                            <img src="{{ asset('assets/img/footer/gallery-2.jpg') }}" alt="gallery-img">
                                            <div class="icon">
                                                <i class="far fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="{{ asset('assets/img/footer/gallery-3.jpg') }}" class="img-popup">
                                            <img src="{{ asset('assets/img/footer/gallery-3.jpg') }}" alt="gallery-img">
                                            <div class="icon">
                                                <i class="far fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="gallery-item">
                                    <div class="thumb">
                                        <a href="{{ asset('assets/img/footer/gallery-4.jpg') }}" class="img-popup">
                                            <img src="{{ asset('assets/img/footer/gallery-4.jpg') }}" alt="gallery-img">
                                            <div class="icon">
                                                <i class="far fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="{{ asset('assets/img/footer/gallery-5.jpg') }}" class="img-popup">
                                            <img src="{{ asset('assets/img/footer/gallery-5.jpg') }}" alt="gallery-img">
                                            <div class="icon">
                                                <i class="far fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="{{ asset('assets/img/footer/gallery-6.jpg') }}" class="img-popup">
                                            <img src="{{ asset('assets/img/footer/gallery-6.jpg') }}" alt="gallery-img">
                                            <div class="icon">
                                                <i class="far fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-wrapper d-flex align-items-center justify-content-between">
                    <p class="wow fadeInLeft color-2" data-wow-delay=".3s">
                        Copyright © 2025 <a href="/">RisingPath</a>. All Rights Reserved.
                    </p>
                    <ul class="footer-menu wow fadeInRight" data-wow-delay=".5s">
                        <li><a href="/about">Company</a></li>
                        <li><a href="/contact">Support</a></li>
                        <li><a href="/privacy">Privacy</a></li>
                        <li><a href="/faq">Faqs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--<< All JS Plugins >>-->
<script src="{{ asset('/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('/assets/js/viewport.jquery.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/js/gsap/gsap.js') }}"></script>
<script src="{{ asset('/assets/js/gsap/gsap-scroll-trigger.js') }}"></script>
<script src="{{ asset('/assets/js/gsap/gsap-split-text.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.waypoints.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('/assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('/assets/js/slick-animation.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('/assets/js/circle-progress.js') }}"></script>
<script src="{{ asset('/assets/js/main.js') }}"></script>
</body>
</html>