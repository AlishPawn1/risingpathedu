@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => $successStory->title,
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Success Stories', 'url' => url('/success-stories')],
            ['label' => $successStory->title],
        ]
    ])
    @endcomponent

    <section class="story-details-section section-padding">
        <div class="container content-wrap">
            <a href="{{ url('/success-stories') }}" class="btn btn-outline-danger mb-4 d-inline-block"><i class="fas fa-arrow-left me-2"></i>Back</a>
            <div class="story-details">
                <div class="card">
                    <div class="image-holder">
                        <img src="{{ $successStory->image ? asset('storage/' . $successStory->image) : asset('assets/img/backfall-user.png') }}"
                        alt="{{ $successStory->title }}-image" class="img-cover">
                    </div>
                    <div class="card-body">
                        <h2>{{ $successStory->title }}</h2>
                        <h3>{{ $successStory->student_name }}</h3>
                        <p class="mb-3">
                            <span class="text-muted">Published on:
                                {{ $successStory->created_at->format('F d, Y') }}</span>
                        </p>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <span class="detail-label">Country:</span> {{ $successStory->country }}
                            </div>
                            <div class="col-md-6">
                                <span class="detail-label">Service:</span> {{ $successStory->service }}
                            </div>
                            <div class="col-md-6">
                                <span class="detail-label">University:</span> {{ $successStory->university }}
                            </div>
                            <div class="col-md-6">
                                <span class="detail-label">Intake:</span> {{ $successStory->intake }}
                            </div>
                            <div class="col-md-6">
                                <span class="detail-label">Visa Approved:</span>
                                {{ $successStory->visa_approved ? 'Yes' : 'No' }}
                            </div>
                        </div>
                        <div class="mb-4">
                            <h4 class="mb-3">Summary</h4>
                            <p>{{ $successStory->summary }}</p>
                        </div>
                        <div>
                            <h4 class="mb-3">Testimonial</h4>
                            <div class="testimonial">
                                {!! $successStory->testimonial !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection