<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="modinatheme">
    <meta name="description" content="Immigration and Visa Consulting Html Template">
    <!-- Use null coalescing operator to handle null meta_keywords -->
    <meta name="keywords" content="{{ $siteSetting->meta_keywords ?? '' }}">
    <!-- ======== Page title ============ -->
    <title>RisingPath - Immigration & Visa Consulting HTML Template</title>
    <!--<< Favicon >>-->
    <link rel="shortcut icon"
        href="{{ optional($siteSetting)->favicon ? asset('storage/' . $siteSetting->favicon) : asset('/assets/img/favicon.svg') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <!--<< Font Awesome.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/meanmenu.css') }}">
    <!--<< Slick.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/slick.css') }}">
    <!--<< Swiper Slider.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/swiper-bundle.min.css') }}">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/nice-select.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    <!--<< Style.css >>-->
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
</head>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<body>
    <!-- Back To Top Start -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="R" class="letters-loading">R</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader="G" class="letters-loading">G</span>
                <span data-text-preloader="P" class="letters-loading">P</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
                <span data-text-preloader="H" class="letters-loading">H</span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!--<< Mouse Cursor Start >>-->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="/">
                                <img src="{{ optional($siteSetting)->site_logo ? asset('storage/' . $siteSetting->site_logo) : asset('assets/img/logo/logo.svg') }}"
                                    alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button><i class="fas fa-times"></i></button>
                        </div>
                    </div>

                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <h4>Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon"><i class="fal fa-map-marker-alt"></i></div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">{{ optional($siteSetting)->location ?? '' }}</a>
                                </div>
                            </li>
                            @if(!empty(optional($siteSetting)->email))
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15"><i class="fal fa-envelope"></i></div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:{{ optional($siteSetting)->email ?? '' }}"
                                            class="link">{{ optional($siteSetting)->email ?? '' }}</a>
                                    </div>
                                </li>
                            @endif
                            @if(!empty(optional($siteSetting)->business_hours))
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15"><i class="fal fa-clock"></i></div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">{{ optional($siteSetting)->business_hours ?? '' }}</a>
                                    </div>
                                </li>
                            @endif
                            @if(!empty(optional($siteSetting)->contact_number))
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15"><i class="far fa-phone"></i></div>
                                    <div class="offcanvas__contact-text">
                                        <a
                                            href="tel:{{ optional($siteSetting)->contact_number ?? '' }}">{{ optional($siteSetting)->contact_number ?? '' }}</a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <div class="header-button mt-4">
                            <a href="/contact" class="theme-btn text-center">
                                <span>Contact Us<i class="fas fa-chevron-right"></i></span>
                            </a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            @if(!empty(optional($siteSetting)->facebook))
                                <a href="{{ optional($siteSetting)->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(!empty(optional($siteSetting)->twitter))
                                <a href="{{ optional($siteSetting)->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if(!empty(optional($siteSetting)->youtube))
                                <a href="{{ optional($siteSetting)->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if(!empty(optional($siteSetting)->linkedin))
                                <a href="{{ optional($siteSetting)->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if(!empty(optional($siteSetting)->instagram))
                                <a href="{{ optional($siteSetting)->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- Header Top Start -->
    <div class="header-top-section fix">
        <div class="container">
            <div class="header-top-wrapper">
                <ul class="contact-list">
                    @if(!empty(optional($siteSetting)->email))
                        <li>
                            <i class="far fa-envelope"></i>
                            <a href="mailto:{{ optional($siteSetting)->email ?? '' }}"
                                class="link">{{ optional($siteSetting)->email ?? '' }}</a>
                        </li>
                    @endif
                    @if(!empty(optional($siteSetting)->location))
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ optional($siteSetting)->location ?? '' }}
                        </li>
                    @endif
                </ul>
                <div class="top-right">
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
                    <ul class="header-menu">
                        <li><a href="/contact">Help</a></li>
                        <li><a href="/contact">Support</a></li>
                        <li><a href="/faq">Faqs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-section-1">
        <div id="header-sticky" class="header-1">
            <div class="container-fluid">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="header-left">
                            <div class="logo" style="height: 4rem; width: 16rem;">
                                <a href="/" class="header-logo">
                                    <img src="{{ optional($siteSetting)->site_logo ? asset('storage/' . $siteSetting->site_logo) : asset('assets/img/logo/logo.svg') }}"
                                        alt="logo-img">
                                </a>
                            </div>
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="has-dropdown active menu-thumb">
                                                <a href="/">Home</a>
                                            </li>
                                            <li><a href="/about">About</a></li>
                                            <li><a href="/news">Blog</a></li>
                                            <!-- <li><a href="/services">Visa</a></li> -->
                                            <li><a href="/courses">Visa</a></li>
                                            <li><a href="/contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            @if(!empty(optional($siteSetting)->contact_number))
                                <div class="contact-info">
                                    <div class="icon">
                                        <img src="{{ asset('assets/img/call.png') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <p>Phone:</p>
                                        <h6><a
                                                href="tel:{{ optional($siteSetting)->contact_number ?? '' }}">{{ optional($siteSetting)->contact_number ?? '' }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endif
                            <div class="header-button">
                                <a href="/contact" class="link-btn">
                                    <span>Get A Quote</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                            <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                            <div class="header__hamburger d-lg-none my-auto">
                                <div class="sidebar__toggle">
                                    <i class="far fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Search Area Start -->
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fas fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>