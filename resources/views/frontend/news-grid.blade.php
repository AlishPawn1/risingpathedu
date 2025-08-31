@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Blog grid',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Blogs', 'url' => url('/blogs')],
            ['label' => 'Blog grid'],
        ]
    ])
    @endcomponent

    <!--<< News Section Start >>-->
    <section class="news-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                @if($blogs->count())
                    @foreach($blogs as $blog)
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".{{ 3 + 2 * $loop->index }}s">
                            <div class="news-box-items mt-0">
                                <div class="news-image">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                    <h6 class="date">{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }} <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}</span></h6>
                                </div>
                                <div class="news-content">
                                    <ul class="post-date">
                                        <li>
                                            <i class="far fa-user-circle"></i>
                                            {{ $blog->author ?? 'Admin' }}
                                        </li>
                                        <li>
                                            <i class="fal fa-comments"></i>
                                            {{ $blog->comments->count() ?? 0 }} Comments
                                        </li>
                                    </ul>
                                    <h3><a href="{{ url('news', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                    <p>
                                        {{ Str::limit(strip_tags($blog->description), 100) }}
                                    </p>
                                    <a href="{{ url('news', $blog->slug) }}" class="link-btn">
                                        <span>Read More</span> <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">
                        No blogs found.
                    </div>
                @endif
            </div>
            <!-- Pagination -->
            <div class="page-nav-wrap mt-5 text-center">
                {{ $blogs->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

@endsection