@extends('layouts.web')

@section('content')

<!-- Page Header Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">{{ $response['service']['title'] }}</h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('services') }}">services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $response['service']['title'] }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Page Service Single Start -->
<div class="page-service-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <!-- Service Sidebar Start -->
                <div class="service-sidebar">
                    <!-- Service Category List Start -->
                    <div class="service-catagery-list wow fadeInUp">
                        <h3>services category</h3>
                        <ul>
                            @foreach($response['services'] as $s)
                                <li><a href="{{ route('service.detail', $s['slug']) }}">{{ $s['title'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Service Category List End -->

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
                <!-- Service Sidebar End -->
            </div>

            <div class="col-lg-8">
                <!-- Service Single Content Start -->
                <div class="service-single-content">
                    <!-- Service Feature Image Start -->
                    <div class="service-feature-image">
                        <figure class="image-anime reveal">
                            <img src="{{ asset('storage/' . $response['service']['image']) }}" alt="{{ $response['service']['title'] }}">
                        </figure>
                    </div>
                    <!-- Service Feature Image End -->
                    <!-- Service Entry Start -->
                    <div class="service-entry">
                        <!-- Note: The service description text is not available in the current data structure -->
                        <p class="wow fadeInUp">{{$response['service']['description']['section_1']}} </p>

                        @if(isset($response['service']['description']) && is_array($response['service']['description']))
                            <!-- Service Benefits Start -->
                            <div class="service-benefits">
                                <h2 class="text-anime-style-2">Benefits <span>{{ $response['service']['title'] }}</span></h2>
                                <p class="wow fadeInUp">{{ $response['service']['description']['section_2'] ?? '' }}</p>

                                <!-- Service Benefit List Start -->
                                @if(isset($response['service']['description']['benefits']) && is_array($response['service']['description']['benefits']))
                                    <div class="service-benefit-list wow fadeInUp" data-wow-delay="0.2s">
                                        <ul>
                                            @foreach($response['service']['description']['benefits'] as $benefit)
                                                <li>{{ $benefit }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- Service Benefit List End -->

                                <!-- Service Benefits Images Start -->
                                <div class="service-benefits-images">
                                    <!-- foreach($response['service']['benefit_images'] as $image)
                                        <div class="service-benefits-img">
                                            <figure class="image-anime reveal">
                                                <img src= asset('storage/' . $image)" alt="">
                                            </figure>
                                        </div>
                                    endforeach -->
                                </div>
                                <!-- Service Benefits Images End -->
                            </div>
                            <!-- Service Benefits End -->

                            <!-- Service Design Process Start -->
                            <div class="service-design-process">
                                <h2 class="text-anime-style-2">Design <span>process</span></h2>
                                <p class="wow fadeInUp">{{ $response['service']['description']['section_3'] ?? '' }}</p>

                                <!-- Design Process Item List Start -->
                                @if(isset($response['service']['description']['process']) && is_array($response['service']['description']['process']))
                                    <div class="design-process-item-list">
                                        @foreach($response['service']['description']['process'] as $index => $step)
                                            <div class="design-process-item wow fadeInUp" data-wow-delay="{{ 0.2 + (intval($index) * 0.2) }}s">
                                                <div class="icon-box">
                                                    <img src="{{ asset('storage/' . ($step['icon'] ?? 'images/icon-service-1.svg')) }}" alt="">
                                                </div>
                                                <div class="design-process-item-content">
                                                    <h3>{{ $step['title'] ?? '' }}</h3>
                                                    <p>{{ $step['description'] ?? '' }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Design Process Item List End -->
                            </div>
                            <!-- Service Design Process End -->
                        @endif
                    </div>
                    <!-- Service Entry End -->

                    <!-- Page Single Faqs Start -->
                    @if(isset($response['service']['description']['faqs']) && is_array($response['service']['description']['faqs']))
                        <div class="page-single-faqs">
                            <div class="section-title">
                                <h3 class="wow fadeInUp">FAQ's</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">Find your <span>answers here</span></h2>
                            </div>

                            <div class="faq-accordion" id="accordion">
                                @foreach($response['service']['description']['faqs'] as $index => $faq)
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="{{ intval($index) * 0.2 }}s">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" 
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" 
                                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                                {{ $faq['question'] ?? '' }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                                             aria-labelledby="heading{{ $index }}" data-bs-parent="#accordion">
                                            <div class="accordion-body">
                                                <p>{{ $faq['answer'] ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <!-- Page Single Faqs End -->
                </div>
                <!-- Service Single Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Service Single End -->

@endsection
