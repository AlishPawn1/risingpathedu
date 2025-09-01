@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => $course->name,
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Courses', 'url' => url('/courses')],
            ['label' => $course->name],
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
                                    @foreach($relatedCourses as $related)
                                        <li>
                                            <a href="{{ route('courses.show', $related->slug) }}">
                                                {{ $related->name }}
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
                                    @if(!empty($siteSetting->contact_number))
                                        <h3><a
                                                href="tel:{{ $siteSetting->contact_number }}">{{ $siteSetting->contact_number }}</a>
                                        </h3>
                                    @endif
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
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
                            @if ($course->image)
                                <div class="details-image">
                                    <img src="{{ asset('storage/' . $course->image) }}">
                                </div>
                            @endif
                            <div class="details-content">
                                <div>{!! $course->description !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection