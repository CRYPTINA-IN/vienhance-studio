@extends('layouts.web')

@section('content')

<!-- Page Header Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Our <span>blog</span></h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">our blog</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>	
</div>
<!-- Page Header End -->

<!-- Page Blog Start -->
<div class="page-blog">
        <div class="container">
            <div class="row">
                @forelse($response['blogs'] as $index => $blog)
                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" @if($index > 0) data-wow-delay="{{ $index * 0.2 }}s" @endif>
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image">
                            <a href="{{ route('blog.detail', $blog->slug) }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset($blog->featured_image ?: 'images/post-' . ($index + 1) . '.jpg') }}" alt="{{ $blog->title }}">
                                </figure>    
                            </a>                            
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Item Body Start -->
                        <div class="post-item-body">
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h2>
                                @if($blog->excerpt)
                                <p>{{ Str::limit($blog->excerpt, 120) }}</p>
                                @endif
                            </div>
                            <!-- Post Item Content End -->

                            <!-- Post Item Footer Start -->
                            <div class="post-item-footer">
                                <!-- Post Item Tag Start -->
                                <div class="post-item-meta">
                                    <ul>
                                        <li>{{ $blog->formatted_date }}</li>
                                        @if($blog->tags->count() > 0)
                                        <li>{{ $blog->tags->first()->name }}</li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- Post Item Tag End -->

                                <!-- Post Item Readmore Button Start-->
                                <div class="post-item-btn">
                                    <a href="{{ route('blog.detail', $blog->slug) }}" class="readmore-btn">read more</a>
                                </div>
                                <!-- Post Item Readmore Button End-->
                            </div>
                            <!-- Post Item Footer End -->
                        </div>
                        <!-- Post Item Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <h3>No blog posts found</h3>
                        <p>Check back soon for new content!</p>
                    </div>
                </div>
                @endforelse

                @if($response['blogs']->hasPages())
                <div class="col-lg-12">
                    <!-- Page Pagination Start -->
                    <div class="page-pagination wow fadeInUp" data-wow-delay="1.2s">
                        <nav aria-label="Blog pagination">
                            {{ $response['blogs']->links() }}
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Page Blog End -->

@endsection


