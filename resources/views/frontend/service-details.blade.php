@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => $service->title,
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Service', 'url' => url('/services')],
            ['label' => $service->title],
        ]
    ])
    @endcomponent

    <!--<< Visa Details Section Start >>-->
    <section class="visa-details-section fix section-padding">
        <div class="container">
            <div class="visa-details-wrapper">
                <div class="row g-5">
                    <div class="col-lg-4 order-2 order-md-1">
                        <div class="visa-sidebar">
                            <div class="visa-widget-categories">
                                <ul>
                                    @foreach($relatedServices as $related)
                                        <li>
                                            <a href="{{ route('service.show', $related->slug) }}">
                                                {{ $related->title }}
                                                <span><i class="fas fa-chevron-right"></i></span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="visa-sidebar-widget">
                                <div class="contact-bg text-center bg-cover"
                                     style="background-image: url('{{ asset('assets/img/service/contact-bg.jpg') }}');">
                                    <h4>Do You Have any <br> question?</h4>
                                    <h3><a href="tel:{{ $siteSetting->contact_number ?? '808555-0111' }}">{{ $siteSetting->contact_number ?? '(808) 555-0111' }}</a></h3>
                                    <p>It is a long established fact that a reader will be distracted by the rea</p>
                                    <a href="{{ url('contact') }}" class="theme-btn bg-white">
                                        <span>
                                            contact us
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-1 order-md-2">
                        <div class="service-details-items">
                            @if ($service->image)
                                <div class="details-image">
                                    <img src="{{ asset('storage/' . $service->image) }}">
                                </div>
                            @endif
                            <div class="details-content">
                                <p>{{ $service->short_description }}</p>
                                <div>{!! $service->description !!}</div>

                                @if(isset($faqs) && count($faqs))
                                    <div class="faq-content">
                                        <div class="faq-accordion">
                                            <div class="accordion" id="accordion-dynamic">
                                                @foreach($faqs as $index => $faq)
                                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".{{ $index + 1 }}s">
                                                        <h4 class="accordion-header">
                                                            <button class="accordion-button {{ $index ? 'collapsed' : '' }}" type="button"
                                                                    data-bs-toggle="collapse" data-bs-target="#faq-{{ $index }}"
                                                                    aria-expanded="{{ $index ? 'false' : 'true' }}"
                                                                    aria-controls="faq-{{ $index }}">
                                                                {{ $faq->title }}
                                                            </button>
                                                        </h4>
                                                        <div id="faq-{{ $index }}" class="accordion-collapse collapse{{ $index ? '' : ' show' }}"
                                                             data-bs-parent="#accordion-dynamic">
                                                            <div class="accordion-body">
                                                                {!! $faq->description !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection