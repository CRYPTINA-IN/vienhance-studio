@extends('layouts.web')
@section('content')
 <!-- Page Header Start -->
 <div class="page-header bg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">{{ $response['portfolio']->title }}</h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('portfolio') }}">our portfolio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $response['portfolio']->title }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>	
	</div>
	<!-- Page Header End -->

    <!-- Page Work Single Start -->
    <div class="page-work-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Work Single Sidebar Start -->
                    <div class="work-single-sidebar">
                        <!-- Work Category List Start -->
                        <div class="work-category-list wow fadeInUp">
                            <!-- Work Category Title Start -->
                            <div class="work-category-title">
                                <h3>Project Details</h3>
                            </div>
                            <!-- Work Category Title End -->

                            <!-- Category Item List Start -->
                            <div class="category-item-list">
                                <div class="category-list-item">
                                    <h3><img src="images/icon-work-category-1.svg" alt=""> project name:</h3>
                                    <p>{{ strtolower($response['portfolio']->title) }}</p>
                                </div>
                                <div class="category-list-item">
                                    <h3><img src="images/icon-work-category-2.svg" alt=""> clients:</h3>
                                    <p>{{ $response['portfolio']->client }}</p>
                                </div>
                                <div class="category-list-item">
                                    <h3><img src="images/icon-work-category-3.svg" alt=""> industry:</h3>
                                    <p>{{ $response['portfolio']->industry }}</p>
                                </div>
                                <div class="category-list-item">
                                    <h3><img src="images/icon-work-category-4.svg" alt=""> status:</h3>
                                    <p>{{ ucfirst($response['portfolio']->status) }}</p>
                                </div>
                                <div class="category-list-item category-social-link">
                                    <h3>share:</h3>
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Category Item List End -->
                        </div>
                        <!-- Work Category List End -->

                        <!-- Sidebar Cta Box Start -->
                        <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.25s">
                            <!-- Icon Box Start -->
                            <div class="icon-box">
                                <img src="images/icon-sidebar-cta.svg" alt="">
                            </div>
                            <!-- Icon Box End -->

                            <!-- CTA Contact Content Start -->
                            <div class="cta-contact-content">
                                <p>We always available to discus with you</p>
                                <h3><a href="#">info@domain.com</a></h3>
                            </div>
                            <!-- CTA Contact Content End -->

                            <!-- CTA Contact Button Start -->
                            <div class="cta-contact-btn">
                                <a href="{{ route('contact') }}" class="btn-default">contact us</a>
                            </div>
                            <!-- CTA Contact Button End -->
                        </div>
                        <!-- Sidebar Cta Box End -->
                    </div>
                    <!-- Work Single Sidebar End -->
                </div>

                <div class="col-lg-8">
                    <!-- Work Single Content Start -->
                    <div class="work-single-content">
                        <!-- Work Featured Image Start -->
                        <div class="work-feature-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('storage/' . $response['portfolio']->image) }}" alt="{{ $response['portfolio']->title }}" class="image-fluid rounded-3">
                            </figure>
                        </div>
                        <!-- Work Featured Image End -->

                        <!-- Work Entry Start-->
                        <div class="work-entry">
                            <!-- Poject Overview Start-->
                            <div class="project-overview">
                                <h2 class="text-anime-style-2">Project <span>overview</span></h2>

                                <p class="wow fadeInUp">{{ $response['portfolio']->overview }}</p>

                                <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $response['portfolio']->about_project }}</p>
                            </div>
                            <!-- Poject Overview End-->


                            <!-- Project Gallery Start -->
                            <div class="project-gallery">
                                <h2 class="text-anime-style-2">Project <span>gallery</span></h2>
                                
                                <div class="row g-4">
                                    @foreach($response['portfolio']->gallery as $index => $galleryItem)
                                    <div class="col-md-6">
                                        <div class="gallery-item wow fadeInUp" @if($index % 2 == 1) data-wow-delay="0.2s" @endif>
                                            <figure class="image-anime">
                                                <img src="{{ asset('storage/' . $galleryItem->image) }}" alt="{{ $galleryItem->alt_text ?? 'Gallery Image ' . ($index + 1) }}" class="image-fluid rounded-3">
                                            </figure>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Project Gallery End -->

                            
                    </div>
                    <!-- Work Single Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Work Single End -->


@endsection
