@extends('layouts.main.app')

@section('content')


    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Faq',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Faq'],
        ]
    ])
    @endcomponent

    <!--<< Faq Section Start >>-->
    <section class="faq-section fix section-padding">
        <div class="container">
            <div class="faq-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title">
                            <span class="wow fadeInUp">FAQ</span>
                            <h2 class="title-anim">
                                Frequently Asked <br> Questions
                            </h2>
                        </div>
                        <p class="mt-3 mt-md-0 mb-2 wow fadeInUp" data-wow-delay=".5s">
                            Sed ut perspiciatis unde omniste natus voluptatem <br> accusantiume rem aperia eaque quae abillo
                            inventore <br> veritatis quasi architecto beatae vitae
                        </p>
                        <a href="{{ url('faq') }}" class="theme-btn mt-4 wow fadeInUp" data-wow-delay=".7s">
                            <span> Read More <i class="fas fa-chevron-right"></i></span>
                        </a>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="single-tab-items">
                            <ul class="nav mb-4" role="tablist">
                                @foreach($faqsTabs as $tab)
                                    <li class="nav-item wow fadeInUp" data-wow-delay="{{ $tab['delay'] }}" role="presentation">
                                        <a href="#{{ $tab['slug'] }}" data-bs-toggle="tab"
                                            class="nav-link {{ $loop->first ? 'active' : '' }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}" role="tab">
                                            {{ $tab['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach($faqsTabs as $tab)
                                    <div id="{{ $tab['slug'] }}" class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                        role="tabpanel">
                                        <div class="faq-content">
                                            <div class="faq-accordion">
                                                <div class="accordion" id="accordion{{ $tab['slug'] }}">
                                                    @foreach($tab['faqs'] as $faq)
                                                        <div class="accordion-item wow fadeInUp"
                                                            data-wow-delay="{{ $faq['delay'] }}">
                                                            <h4 class="accordion-header">
                                                                <button
                                                                    class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#faq{{ $tab['slug'] }}{{ $loop->index }}"
                                                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                                    aria-controls="faq{{ $tab['slug'] }}{{ $loop->index }}">
                                                                    {{ $faq['question'] }}
                                                                </button>
                                                            </h4>
                                                            <div id="faq{{ $tab['slug'] }}{{ $loop->index }}"
                                                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                                data-bs-parent="#accordion{{ $tab['slug'] }}">
                                                                <div class="accordion-body">
                                                                    {{ $faq['answer'] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Project Details Image Start >>-->
    <div class="project-details-wrapper fix section-padding pt-0">
        <div class="container">
            <div class="project-details-image mt-0">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="details-image">
                            <img src="{{ asset('assets/img/project/details.jpg') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="details-image">
                            <img src="{{ asset('assets/img/project/details-2.jpg') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<< Faq Section Start >>-->
    <section class="faq-section section-padding pt-0">
        <div class="container">
            <div class="about-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="wow fadeInUp">freequently Ask Questions</span>
                                <h2 class="title-anim">
                                    have a question in <br>
                                    your mind?
                                </h2>
                            </div>
                            <p class=" mt-4 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                Transmds is the world’s driving worldwide coordinations <br>
                                supplier — we uphold industry and exchange the
                            </p>
                            <div class="circle-progress-bar-wrapper">
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".7s">
                                    <div class="circle-bar" data-percent="68" data-duration="1000">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            Organizations <br>
                                            work support
                                        </h6>
                                    </div>
                                </div>
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".9s">
                                    <div class="circle-bar" data-percent="93" data-duration="1000">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            Management & <br>
                                            Support Services
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="faq-content style-2 style-color">
                            <div class="faq-accordion">
                                <div class="accordion" id="accordions">
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".3s">
                                        <h4 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq133" aria-expanded="false"
                                                aria-controls="faq133">
                                                How to learn digital marketing?
                                            </button>
                                        </h4>
                                        <div id="faq133" class="accordion-collapse collapse" data-bs-parent="#accordions">
                                            <div class="accordion-body">
                                                Ne summo dictas pertinacia nam. Illum cetero vocent ei vim, case regione
                                                signiferumque vim te. Ex mea quem munere lobortis. Duis aute irure dolor in
                                                reprehenderit in voluptate velit esse cillum.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".5s">
                                        <h4 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#faq233" aria-expanded="true" aria-controls="faq233">
                                                Can I use the demos made by Ewebot?
                                            </button>
                                        </h4>
                                        <div id="faq233" class="accordion-collapse collapse show"
                                            data-bs-parent="#accordions">
                                            <div class="accordion-body">
                                                Ne summo dictas pertinacia nam. Illum cetero vocent ei vim, case regione
                                                signiferumque vim te. Ex mea quem munere lobortis. Duis aute irure dolor in
                                                reprehenderit in voluptate velit esse cillum.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".7s">
                                        <h4 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq3333" aria-expanded="false"
                                                aria-controls="faq3333">
                                                Why didn’t you showcase my submission?
                                            </button>
                                        </h4>
                                        <div id="faq3333" class="accordion-collapse collapse" data-bs-parent="#accordions">
                                            <div class="accordion-body">
                                                Ne summo dictas pertinacia nam. Illum cetero vocent ei vim, case regione
                                                signiferumque vim te. Ex mea quem munere lobortis. Duis aute irure dolor in
                                                reprehenderit in voluptate velit esse cillum.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".9s">
                                        <h4 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq4444" aria-expanded="false"
                                                aria-controls="faq4444">
                                                Why didn’t you showcase my submission?
                                            </button>
                                        </h4>
                                        <div id="faq4444" class="accordion-collapse collapse" data-bs-parent="#accordions">
                                            <div class="accordion-body">
                                                Ne summo dictas pertinacia nam. Illum cetero vocent ei vim, case regione
                                                signiferumque vim te. Ex mea quem munere lobortis. Duis aute irure dolor in
                                                reprehenderit in voluptate velit esse cillum.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Brand Section Start >>-->
    <div class="brand-section-2 fix section-bg-2 mt-0">
        <div class="container">
            <div class="brand-wrapper style-2">
                <div class="brand-carousel-active-2">
                    <div class="brand-image">
                        <img src="{{ asset('assets/img/brand/01.png') }}" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="{{ asset('assets/img/brand/01.png') }}" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="{{ asset('assets/img/brand/01.png') }}" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="{{ asset('assets/img/brand/01.png') }}" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="{{ asset('assets/img/brand/01.png') }}" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="{{ asset('assets/img/brand/01.png') }}" alt="brand-img">
                    </div>
                    <div class="brand-image">
                        <img src="{{ asset('assets/img/brand/01.png') }}" alt="brand-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection