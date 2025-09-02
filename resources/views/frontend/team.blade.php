@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Teams',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Teams'],
        ]
    ])
    @endcomponent

    <!--<< Team Section Start >>-->
    <section class="team-section section-padding">
        <div class="container">
            <div class="row g-4">
                @foreach($teams as $index => $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 + (0.2 * $index) }}s">
                        <div class="single-team-items mt-0">
                            <div class="team-image">
                                <img src="{{ $team->image ? asset('storage/' . $team->image) : asset('assets/img/team/01.jpg') }}"
                                    alt="{{ $team->name }}">
                                @if($team->facebook || $team->twitter || $team->linkedin)
                                <div class="social-profile">
                                    <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                    <ul>
                                        @if($team->facebook)
                                            <li><a href="{{ $team->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if($team->twitter)
                                            <li><a href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if($team->instagram)
                                            <li><a href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        @endif
                                        @if($team->linkedin)
                                            <li><a href="{{ $team->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <div class="team-content text-center box-shadow">
                                <h5>
                                    <a href="{{ route('teams.show', $team->slug) }}">{{ $team->name }}</a>
                                </h5>
                                <p>{{ $team->designation ?? $team->post }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection