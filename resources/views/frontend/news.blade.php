@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => 'Blogs',
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Blogs'],
        ]
    ])
    @endcomponent

    <!--<< Blog Wrapper Here >>-->
    <section class="blog-wrapper news-wrapper section-padding border-bottom">
        <div class="container">
            <div class="news-area">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="blog-posts">
                            @if($blogs->count())
                                @foreach($blogs as $blog)
                                    <div class="single-blog-post">
                                        <div class="post-featured-thumb bg-cover"
                                            style="background-image: url('{{ asset('storage/' . $blog->image) }}');">
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta">
                                                <span><i class="fal fa-comments"></i>{{ $blog->comments->count() ?? 0 }}
                                                    Comments</span>
                                                <span><i
                                                        class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</span>
                                            </div>
                                            <h2 class="title-anim">
                                                <a href="{{ url('news', $blog->slug) }}">
                                                    {{ $blog->title }}
                                                </a>
                                            </h2>
                                            <p>
                                                {{ Str::limit(strip_tags($blog->description), 150) }}
                                            </p>
                                            <a href="{{ url('news', $blog->slug) }}" class="theme-btn mt-4 line-height">
                                                <span>READ MORE <i class="fas fa-chevron-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning text-center">
                                    No blogs found.
                                </div>
                            @endif
                        </div>
                        <div class="page-nav-wrap mt-5 text-center">
                            {{ $blogs->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-sidebar">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Search</h3>
                                </div>
                                <div class="search_widget">
                                    <form action="{{ url('news') }}" method="GET">
                                        <input type="text" name="keywords" placeholder="Keywords here....">
                                        <button type="submit"><i class="fal fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Popular Feeds</h3>
                                </div>
                                <div class="popular-posts">
                                    @foreach($popularBlogs as $blog)
                                        <div class="single-post-item">
                                            <div class="thumb bg-cover"
                                                style="background-image: url('{{ asset('storage/' . $blog->image) }}');"></div>
                                            <div class="post-content">
                                                <h5>
                                                    <a href="{{ url('news-details', $blog->slug) }}">
                                                        {{ $blog->title }}
                                                    </a>
                                                </h5>
                                                <div class="post-date">
                                                    <i class="far fa-calendar-alt"></i>
                                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                                </div>
                                                <div class="post-comments">
                                                    <i class="fal fa-comments"></i>
                                                    {{ $blog->comments_count ?? 0 }} Comments
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Categories</h3>
                                </div>
                                <div class="widget_categories">
                                    <ul>
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{ url('news', ['category' => $category->slug]) }}">
                                                    {{ $category->name }} <span>{{ $category->blogs->count() }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="single-sidebar-widget d-none">
                                <div class="wid-title">
                                    <h3>Never Miss News</h3>
                                </div>
                                <div class="social-link">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Popular Tags</h3>
                                </div>
                                <div class="tagcloud">
                                    @foreach($tags as $tag)
                                        <a href="{{ url('news', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection