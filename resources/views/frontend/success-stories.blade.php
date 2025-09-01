@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Success Stories',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Success Stories'],
        ]
    ])
    @endcomponent

    <!--<< Service Section Start >>-->
    <section class="service-section fix section-padding">
        <div class="container">
            <div class="service-wrapper p-0">
                <div class="row g-4">
                    @foreach ($successStories as $index => $successStory)
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 * $index }}s">
                            <div class="service-card-items {{ $index == 2 ? 'active' : '' }}">
                                <div>
                                    <h3><a href="{{ url('success-story/' . $successStory->slug) }}">{{ $successStory->title }}</a></h3>
                                    <p>
                                        {!! Str::limit($successStory->summary, 50) !!}
                                    </p>
                                </div>
                                <div>
                                    <div class="service-thumb">
                                        <img src="{{ $successStory->image ? asset('storage/' . $successStory->image) : asset('assets/img/backfall-user.png') }}"
                                            alt="{{ $successStory->name }}-image">
                                    </div>
                                    <a href="{{ url('success-story/' . $successStory->slug) }}" class="link-btn">
                                        <span>read more</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($successStories->hasPages())
                    <div class="mt-4">
                        {{ $successStories->links('vendor.pagination.custom') }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!--<< Contact Section Start >>-->
    <x-contact-section />

@endsection