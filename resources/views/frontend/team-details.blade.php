@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => $team->name,
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Teams', 'url' => url('/teams')],
            ['label' => $team->name],
        ]
    ])
    @endcomponent

    <!-- Team Details Section Start -->
    <section class="team-details-section fix section-padding">
        <div class="container">
            <div class="team-details-wrapper">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="team-image bg-cover"
                            style="background-image: url('{{ $team->image ? asset('storage/' . $team->image) : asset('assets/img/team/details-1.jpg') }}');">
                        </div>
                    </div>
                    <div class="col-lg-5 mt-5 mt-lg-0 wow fadeInUp" data-wow-delay=".5s">
                        <div class="team-details-content">
                            <h3>{{ $team->name }}</h3>
                            <span>{{ $team->post }}</span>
                            <p>
                                {!! $team->description ?? 'No bio available.' !!}
                            </p>
                            <div class="social-icon d-flex align-items-center">
                                @if($team->facebook)
                                    <a href="{{ $team->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($team->twitter)
                                    <a href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($team->instagram)
                                    <a href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if($team->linkedin)
                                    <a href="{{ $team->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                @endif
                            </div>
                            <a href="{{ url('contact') }}" class="theme-btn mt-5">
                                <span class="mb-0">
                                    Get a Free Quote
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Skill Section Start -->
    <section class="team-skill fix section-padding d-none">
        <div class="container">
            <div class="team-skill-wrapper">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="team-skill-content">
                            <h3>
                                {{ $team->skills_title ?? 'Welcome to our team member profile' }}
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-4 mt-lg-0 wow fadeInUp" data-wow-delay=".5s">
                        <div class="progress-wrap">
                            @if(!empty($team->skills) && is_array($team->skills))
                                @foreach($team->skills as $skill)
                                    <div class="pro-items">
                                        <div class="pro-head">
                                            <h6 class="title">
                                                {{ $skill['name'] ?? '' }}
                                            </h6>
                                            <span class="point">
                                                {{ $skill['percent'] ?? '' }}%
                                            </span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-value" style="width: {{ $skill['percent'] ?? 0 }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <!-- Default skills if none provided -->
                                <div class="pro-items">
                                    <div class="pro-head">
                                        <h6 class="title">business management</h6>
                                        <span class="point">65%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-value"></div>
                                    </div>
                                </div>
                                <div class="pro-items">
                                    <div class="pro-head">
                                        <h6 class="title">technology solution</h6>
                                        <span class="point">75%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-value style-two"></div>
                                    </div>
                                </div>
                                <div class="pro-items">
                                    <div class="pro-head">
                                        <h6 class="title">Human Interaction</h6>
                                        <span class="point">65%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-value"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Contact Section Start >>-->
    <x-contact-section />
@endsection