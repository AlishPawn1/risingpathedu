@extends('layouts.main.app')


@section('content')
    <!--<< Breadcrumb Section Start >>-->
    <div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('{{ asset('assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Error</h1>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ url('/') }}">
                            Home Page
                        </a>
                    </li>
                    <li>
                        <i class="fal fa-minus"></i>
                    </li>
                    <li>
                        Error
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- 404 Error Section Start -->
    <section class="error-section section-padding fix">
        <div class="container">
            <div class="error-content text-center">
                <h2 class="wow fadeInUp" data-wow-delay=".3s">4<span>0</span>4</h2>
                <h3 class="wow fadeInUp" data-wow-delay=".5s">we’re sorry page not found</h3>
                <a href="{{ url('/') }}" class="theme-btn style-line-height mt-5 wow fadeInUp" data-wow-delay=".7s">
                    <span class="button-text">Back To Home</span>
                </a>
            </div>
        </div>
    </section>

@endsection