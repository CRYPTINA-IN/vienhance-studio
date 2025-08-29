@extends('layouts.web')

@section('content')     

<!-- Page Header Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">{{ $response['blog']->title }}</h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog') }}">our blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $response['blog']->title }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>	
</div>
<!-- Page Header End -->

<!-- Page Single Post Start -->
 <div class="page-single-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Post Featured Image Start -->
                    <div class="post-image">
                        <figure class="image-anime reveal">
                            <img src="{{ asset($response['blog']->featured_image ?: 'images/post-2.jpg') }}" alt="{{ $response['blog']->title }}">
                        </figure>
                    </div>
                    <!-- Post Featured Image End -->

                    <!-- Post Meta Start -->
                    <div class="post-meta wow fadeInUp" data-wow-delay="0.3s">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="post-meta-left">
                                    <span class="post-date">{{ $response['blog']->formatted_date }}</span>
                                    @if($response['blog']->author)
                                    <span class="post-author">by {{ $response['blog']->author->name }}</span>
                                    @endif
                                    @if($response['blog']->reading_time)
                                    <span class="post-reading-time">{{ $response['blog']->reading_time }} min read</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="post-meta-right text-end">
                                    <span class="post-views">{{ $response['blog']->view_count }} views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post Meta End -->

                    <!-- Post Single Content Start -->
                    <div class="post-content">
                        <!-- Post Entry Start -->
                        <div class="post-entry">
                            {!! $response['blog']->content !!}
                        </div>
                        <!-- Post Entry End -->

                        <!-- Post Tag Links Start -->
                        <div class="post-tag-links">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <!-- Post Tags Start -->
                                    <div class="post-tags wow fadeInUp" data-wow-delay="0.5s">
                                        <span class="tag-links">
                                            Tags:
                                            @forelse($response['blog']->tags as $tag)
                                                <a href="#" style="color: {{ $tag->color }};">{{ $tag->name }}</a>
                                            @empty
                                                <span>No tags</span>
                                            @endforelse
                                        </span>
                                    </div>
                                    <!-- Post Tags End -->
                                </div>

                                <div class="col-lg-4">
                                    <!-- Post Social Links Start -->
                                    <div class="post-social-sharing wow fadeInUp" data-wow-delay="0.5s">
                                        <ul>
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($response['blog']->title) }}" target="_blank" rel="noopener"><i class="fa-brands fa-x-twitter"></i></a></li>
                                            <li><a href="https://wa.me/?text={{ urlencode($response['blog']->title . ' ' . request()->url()) }}" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- Post Social Links End -->
                                </div>
                            </div>
                        </div>
                        <!-- Post Tag Links End -->
                    </div>
                    <!-- Post Single Content End -->
                </div>
            </div>

            @if(isset($response['relatedPosts']) && $response['relatedPosts']->count() > 0)
            <!-- Related Posts Start -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="mb-4">Related Posts</h3>
                </div>
                @foreach($response['relatedPosts'] as $relatedPost)
                <div class="col-lg-4 col-md-6">
                    <div class="post-item wow fadeInUp" data-wow-delay="{{ $loop->index * 0.2 }}s">
                        <div class="post-featured-image">
                            <a href="{{ route('blog.detail', $relatedPost->slug) }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset($relatedPost->featured_image ?: 'images/post-' . ($loop->index + 1) . '.jpg') }}" alt="{{ $relatedPost->title }}">
                                </figure>    
                            </a>                            
                        </div>
                        <div class="post-item-body">
                            <div class="post-item-content">
                                <h4><a href="{{ route('blog.detail', $relatedPost->slug) }}">{{ $relatedPost->title }}</a></h4>
                            </div>
                            <div class="post-item-footer">
                                <div class="post-item-meta">
                                    <ul>
                                        <li>{{ $relatedPost->formatted_date }}</li>
                                    </ul>
                                </div>
                                <div class="post-item-btn">
                                    <a href="{{ route('blog.detail', $relatedPost->slug) }}" class="readmore-btn">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Related Posts End -->
            @endif
        </div>
    </div>
    <!-- Page Single Post End -->    
@endsection     
