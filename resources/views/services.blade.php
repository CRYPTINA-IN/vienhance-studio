@extends('layouts.web')

@section('content')
<!-- Page Header Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Explore our <span>services</span></h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">services</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Page Services Section Start -->
<div class="page-services">
    <div class="container">
        <div class="row">
            @foreach($response['services'] as $service)
                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="{{ $service['delay'] }}">
                        <div class="service-image">
                            <a href="{{ $service['link'] }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('storage/' . $service['image']) }}" alt="{{ $service['title'] }}">
                                </figure>
                            </a>
                        </div>
                        <div class="service-body">
                            <div class="service-content">
                                <h3><a href="{{ $service['link'] }}">{{ $service['title'] }}</a></h3>
                                <p>{{ $service['description'] }}</p>
                            </div>
                            <div class="service-btn">
                                <a href="{{ $service['link'] }}"><img src="{{ asset('images/arrrow-light.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Page Services Section End -->

<!-- Use Creative Tools Component -->
@include('components.creative-tools-section')

@endsection