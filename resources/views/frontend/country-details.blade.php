@extends('layouts.main.app')

@props(['formType' => 'simple'])

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => $country->name,
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Country', 'url' => url('/countries')],
            ['label' => $country->name],
        ]
    ])
    @endcomponent

    <section class="country-details-section fix section-padding">
        <div class="container">
            <div class="country-details-wrapper">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="country-details-items">
                            <div class="country-content">
                                <h2 class="title-anim">Study. Work. Live in {{ $country->name }}</h2>
                                <p>{{ $country->short_text }}</p>
                            </div>
                            <div class="details-image">
                                <img src="{{ asset('storage/' . $country->image) }}" alt="{{ $country->name }}">
                            </div>
                            <div>
                                {!! $country->description !!}
                            </div>
                            <div class="row g-4 mt-5 align-items-center">
                                @if(!empty($country->institutes))
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <h3>Institutes:</h3>
                                            <ul>
                                                @foreach(explode("\n", $country->institutes) as $institute)
                                                    @if(trim($institute) != '')
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            {{ $institute }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($country->media_type) && !empty($country->media_url))
                                    <div class="col-lg-6">
                                        <div class="thumb-2">
                                            @if($country->media_type === 'image')
                                                <img src="{{ asset('storage/' . $country->media_url) }}" alt="img">
                                            @elseif($country->media_type === 'video')
                                                <img src="{{ asset('storage/' . $country->image) }}" alt="Video Thumbnail"
                                                    class="img-thumbnail mb-2">
                                                <div class="video-box">
                                                    <a href="{{ $country->media_url }}" class="video-btn ripple video-popup">
                                                        <i class="fas fa-play"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="country-sidebar">
                            <div class="single-contact-form">
                                <h3 class="wid-title">Quick Contact</h3>
                                <form action="{{ route('contact.store') }}" method="POST" id="contact-form"
                                    class="message-form">
                                    @csrf
                                    <div class="single-form-input">
                                        <input type="text" name="name" placeholder="your name" required>
                                    </div>
                                    <div class="single-form-input">
                                        <input type="email" name="email" placeholder="email address" required>
                                    </div>
                                    <div class="single-form-input">
                                        <textarea name="message" placeholder="message" required></textarea>
                                    </div>
                                    <button class="theme-btn" type="submit"><span>Submit</span></button>
                                </form>
                            </div>
                            <div class="country-sidebar-widget">
                                <div class="contact-bg bg-cover"
                                    style="background-image: url('{{ asset('assets/img/service/contact-bg.jpg') }}');">
                                    <h3>Dream Tour</h3>
                                    <h2>
                                        Explore <br>
                                        The World
                                    </h2>
                                    <a href="/contact" class="theme-btn bg-white">
                                        <span>
                                            contact us
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection