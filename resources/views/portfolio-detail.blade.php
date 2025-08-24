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
                                    <h3>Project name:</h3>
                                    <p>{{ strtolower($response['portfolio']->title) }}</p>
                                </div>
                               
                                <div class="category-list-item">
                                    <h3>Industry:</h3>
                                    <p>{{ $response['portfolio']->industry }}</p>
                                </div>
                               
                                
                            </div>
                            <!-- Category Item List End -->
                        </div>
                        <!-- Work Category List End -->

                        <div class="work-category-list wow fadeInUp">
                            <!-- Work Category Title Start -->
                            <div class="work-category-title">
                                <h3>Share</h3>
                            </div>
                            <!-- Work Category Title End -->

                            <!-- Category Item List Start -->
                            <div class="category-item-list">
                               
                               
                                <div class="category-list-item category-social-link">
                                   
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-title="Vienhance Studio">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_x"></a>
<a class="a2a_button_outlook_com"></a>
<a class="a2a_button_email"></a>
<a class="a2a_button_linkedin"></a>
</div>
<script defer src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
                                </div>
                            </div>
                            <!-- Category Item List End -->
                        </div>

                        <!-- Sidebar Cta Box Start -->
                    <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.25s">
                        <div class="icon-box">
                            <img src="{{ asset('images/icon-sidebar-cta.svg') }}" alt="">
                        </div>
                        <div class="cta-contact-content">
                            <p>We are always available to <br> discuss with you</p>
                            <h3><a href="mailto:hello@vienhancestudio.com">hello@vienhancestudio.com</a></h3>
                        </div>
                        <div class="cta-contact-btn">
                            <a href="{{ route('contact') }}" class="btn-default">contact us</a>
                        </div>
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
