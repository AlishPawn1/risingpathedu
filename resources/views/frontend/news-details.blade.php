@extends('layouts.main.app')

@section('content')

    <!--<< Breadcrumb Section Start >>-->
    @component('components.breadcrumb', [
        'title' => $blog->title,
        'layers' => [
            ['label' => 'Home Page', 'url' => url('/')],
            ['label' => 'Blogs', 'url' => url('/blogs')],
            ['label' => $blog->title],
        ]
    ])
    @endcomponent

    <!--<< Blog Wrapper Here >>-->
    <section class="blog-wrapper news-wrapper section-padding border-bottom">
        <div class="container">
            <div class="news-area">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="blog-post-details border-wrap mt-0">
                            <div class="single-blog-post post-details mt-0">
                                <div class="post-content pt-0">
                                    <h2 class="mt-0 title-anim">{{ $blog->title }}</h2>
                                    <div class="post-meta mt-3">
                                        <span><i class="fal fa-user"></i>{{ $blog->author ?? 'Admin' }}</span>
                                        <span><i class="fal fa-comments"></i>{{ $blog->comments->count() ?? 0 }}
                                            Comments</span>
                                        <span><i
                                                class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</span>
                                    </div>
                                    {!! $blog->description !!}
                                    @if($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                            class="single-post-image">
                                    @endif
                                    {{-- Add more dynamic fields as needed --}}
                                </div>
                            </div>
                            <div class="row tag-share-wrap">
                                <div class="col-lg-8 col-12">
                                    <h4>Related Tags</h4>
                                    <div class="tagcloud">
                                        @if($blog->tags->count())
                                            @foreach($blog->tags as $tag)
                                                <a href="{{ url('news?tag=' . $tag->slug) }}">{{ $tag->name }}</a>
                                            @endforeach
                                        @else
                                            <span>No tags</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                    <h4>Social Share</h4>
                                    <div class="social-share">
                                        @php
                                            $shareUrl = urlencode(request()->fullUrl());
                                            $shareTitle = urlencode($blog->title);
                                        @endphp
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                                            target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
                                            target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareTitle }}"
                                            target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank"><i
                                                class="fab fa-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- comments section wrap start -->
                            <div class="comments-section-wrap pt-40">
                                <div class="comments-heading">
                                    <h3>{{ $blog->comments->count() }} Comments</h3>
                                </div>
                                <ul class="comments-item-list">
                                    @forelse($blog->comments as $comment)
                                        <li class="single-comment-item">
                                            <div class="author-img">
                                                <img src="{{ asset('assets/img/backfallImage.png') }}" alt="img">
                                            </div>
                                            <div class="author-info-comment">
                                                <div class="info">
                                                    <h5>{{ $comment->author }}</h5>
                                                    <span>{{ $comment->created_at->format('d M Y') }}</span>
                                                </div>
                                                <div class="comment-text">
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <li>No comments yet.</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="comment-form-wrap d-block pt-5">
                                <h3>Post Comment</h3>
                                <form method="POST" action="{{ url('/blogs/' . $blog->id . '/comments') }}"
                                    class="comment-form">
                                    @csrf
                                    <div class="single-form-input">
                                        <textarea name="content" placeholder="Type your comments...." required></textarea>
                                    </div>
                                    <div class="single-form-input">
                                        <input type="text" name="author" placeholder="Type your name...." required>
                                    </div>
                                    <button class="theme-btn center" type="submit">
                                        <span><i class="fal fa-comments"></i>Post Comment</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-sidebar">
                            <!-- Search Widget -->
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

                            <!-- Popular Feeds -->
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
                                                    <a href="{{ url('news-details', $blog->id) }}">
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

                            <!-- Categories -->
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

                            <!-- Never Miss News -->
                            <div class="single-sidebar-widget d-none">
                                <div class="wid-title">
                                    <h3>Never Miss News</h3>
                                </div>
                                <div class="social-link">
                                    <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>

                            <!-- Popular Tags -->
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const blogId = "{{ $blog->id }}";
        const viewedKey = "blog_viewed_" + blogId;

        if (!sessionStorage.getItem(viewedKey)) {
            fetch("/blogs/" + blogId + "/view", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({})
            }).then(() => {
                sessionStorage.setItem(viewedKey, "1");
            });
        }
    });
</script>