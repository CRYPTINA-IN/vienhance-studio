@extends('layouts.web')
@section('content')


  <!-- Page Header Start -->
  <div class="page-header bg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Our <span>masterpieces</span></h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">our portfolio</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>	
	</div>
	<!-- Page Header End -->

 <!-- Page Works Start -->
 <div class="page-works">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Project Item Boxes start -->
                    <div class="row work-item-boxes align-items-center">
                        @foreach($response['portfolios'] as $index => $portfolio)
                        <div class="col-lg-4 col-md-6 work-item-box">
                            <!-- Work Item Start -->
                            <div class="work-item wow fadeInUp" @if($index > 0) data-wow-delay="{{ $index * 0.2 }}s" @endif>
                                <div class="work-image">
                                    <a href="{{ route('portfolio.detail', $portfolio->slug) }}" data-cursor-text="View">
                                        <figure class="image-anime">
                                            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="work-body">
                                    <div class="work-content">
                                        <h3><a href="{{ route('portfolio.detail', $portfolio->slug) }}">{{ strtolower($portfolio->title) }}</a></h3>
                                        <p>{{ $portfolio->short_description }}</p>
                                    </div>
                                    <div class="work-btn">
                                        <a href="{{ route('portfolio.detail', $portfolio->slug) }}"><img src="images/arrrow-light.svg" alt=""></a>
                                    </div>
                                </div>                        
                            </div>
                            <!-- Work Item End -->
                        </div>
                        @endforeach

                    </div>
                    <!-- Project Item Boxes End -->
                </div>
            </div>

            <!-- Pagination Start -->
            @if($response['portfolios']->hasPages())
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-wrapper wow fadeInUp" data-wow-delay="0.2s">
                        <nav aria-label="Portfolio pagination">
                            {{ $response['portfolios']->links() }}
                        </nav>
                    </div>
                </div>
            </div>
            @endif
            <!-- Pagination End -->
        </div>
    </div>
    <!-- Page Works End -->

@endsection
