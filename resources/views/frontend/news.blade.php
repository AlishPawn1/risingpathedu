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
                            <div class="single-blog-post">
                                <div class="post-featured-thumb bg-cover"
                                    style="background-image: url('{{ asset('assets/img/news/post-1.jpg') }}');">

                                </div>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <span><i class="fal fa-comments"></i>35 Comments</span>
                                        <span><i class="fal fa-calendar-alt"></i>24th March 2024</span>
                                    </div>
                                    <h2 class="title-anim">
                                        <a href="{{ url('news-details') }}">
                                            How to Ensure Direct for The Hassle-Free Visa Process
                                        </a>
                                    </h2>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but majority have
                                        suffered
                                        teration in some form, by injected humour, or randomised words which don't look even
                                        slight
                                        believable. If you are going to use a passage of Lorem Ipsum.
                                    </p>
                                    <a href="{{ url('news-details') }}" class="theme-btn mt-4 line-height">
                                        <span>READ MORE <i class="fas fa-chevron-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="single-blog-post">
                                <div class="post-featured-thumb bg-cover"
                                    style="background-image: url('{{ asset('assets/img/news/post-2.jpg') }}');">

                                </div>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <span><i class="fal fa-comments"></i>35 Comments</span>
                                        <span><i class="fal fa-calendar-alt"></i>24th March 2024</span>
                                    </div>
                                    <h2 class="title-anim">
                                        <a href="{{ url('news-details') }}">
                                            When an Unknown Printer Took a Galley of Type
                                        </a>
                                    </h2>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but majority have
                                        suffered
                                        teration in some form, by injected humour, or randomised words which don't look even
                                        slight
                                        believable. If you are going to use a passage of Lorem Ipsum.
                                    </p>
                                    <a href="{{ url('news-details') }}" class="theme-btn mt-4 line-height">
                                        <span>READ MORE <i class="fas fa-chevron-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="single-blog-post">
                                <div class="post-featured-thumb bg-cover"
                                    style="background-image: url('{{ asset('assets/img/news/post-3.jpg') }}');">

                                </div>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <span><i class="fal fa-comments"></i>35 Comments</span>
                                        <span><i class="fal fa-calendar-alt"></i>24th March 2024</span>
                                    </div>
                                    <h2 class="title-anim">
                                        <a href="{{ url('news-details') }}">
                                            It Has Survived not Only Five Centuries, but Also
                                        </a>
                                    </h2>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but majority have
                                        suffered
                                        teration in some form, by injected humour, or randomised words which don't look even
                                        slight
                                        believable. If you are going to use a passage of Lorem Ipsum.
                                    </p>
                                    <a href="{{ url('news-details') }}" class="theme-btn mt-4 line-height">
                                        <span>READ MORE <i class="fas fa-chevron-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="single-blog-post quote-post format-quote">
                                <div class="post-content text-white bg-cover">
                                    <div class="quote-content">
                                        <div class="icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="quote-text">
                                            <h2 class="title-anim">Excepteur sint occaecat cupida tat non proident, sunt in.
                                            </h2>
                                            <div class="post-meta">
                                                <span><i class="fal fa-comments"></i>35 Comments</span>
                                                <span><i class="fal fa-calendar-alt"></i>24th March 2024</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-nav-wrap mt-5 text-center">
                            <ul>
                                <li><a class="page-numbers" href="#"><i class="fal fa-long-arrow-left"></i></a></li>
                                <li><a class="page-numbers" href="#">01</a></li>
                                <li><a class="page-numbers" href="#">02</a></li>
                                <li><a class="page-numbers" href="#">..</a></li>
                                <li><a class="page-numbers" href="#">10</a></li>
                                <li><a class="page-numbers" href="#">11</a></li>
                                <li><a class="page-numbers" href="#"><i class="fal fa-long-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-sidebar">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Search</h3>
                                </div>
                                <div class="search_widget">
                                    <form action="#">
                                        <input type="text" placeholder="Keywords here....">
                                        <button type="submit"><i class="fal fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Popular Feeds</h3>
                                </div>
                                <div class="popular-posts">
                                    <div class="single-post-item">
                                        <div class="thumb bg-cover"
                                            style="background-image: url('{{ asset('assets/img/news/pp1.jpg') }}');"></div>
                                        <div class="post-content">
                                            <h5><a href="{{ url('news-details') }}">
                                                    Visa Application Fee Increases From July 2024</a></h5>
                                            <div class="post-date">
                                                <i class="far fa-calendar-alt"></i>24th March 2024
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-post-item">
                                        <div class="thumb bg-cover"
                                            style="background-image: url('{{ asset('assets/img/news/pp2.jpg') }}');"></div>
                                        <div class="post-content">
                                            <h5><a href="{{ url('news-details') }}">Top 25 Most In Demand Jobs In Canada</a>
                                            </h5>
                                            <div class="post-date">
                                                <i class="far fa-calendar-alt"></i>25th March 2024
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-post-item">
                                        <div class="thumb bg-cover"
                                            style="background-image: url('{{ asset('assets/img/news/pp3.jpg') }}');"></div>
                                        <div class="post-content">
                                            <h5><a href="{{ url('news-details') }}">The Human Rights And Study Visa
                                                    Programs</a>
                                            </h5>
                                            <div class="post-date">
                                                <i class="far fa-calendar-alt"></i>26th March 2024
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Categories</h3>
                                </div>
                                <div class="widget_categories">
                                    <ul>
                                        <li><a href="{{ url('news') }}">Abroad Study <span>23</span></a></li>
                                        <li><a href="{{ url('news') }}">Green card <span>24</span></a></li>
                                        <li><a href="{{ url('news') }}">PR Applicants <span>11</span></a></li>
                                        <li><a href="{{ url('news') }}">Travel Insurance <span>05</span></a></li>
                                        <li><a href="{{ url('news') }}">Visa Consultancy <span>06</span></a></li>
                                        <li><a href="{{ url('news') }}">Work Permits <span>10</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
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
                                    <a href="{{ url('news') }}">Business</a>
                                    <a href="{{ url('news-details') }}">Consulting</a>
                                    <a href="{{ url('news-details') }}">Education</a>
                                    <a href="{{ url('news-details') }}">Immigration</a>
                                    <a href="{{ url('news-details') }}">Travel</a>
                                    <a href="{{ url('news-details') }}">Visa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection