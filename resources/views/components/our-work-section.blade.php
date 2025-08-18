<!-- Our Work Section Start -->
<div class="our-work bg-section">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-7">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">our work</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Our design <span>masterpieces</span></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-lg-5">
                <!-- Section Button Start -->
                <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                    <a href="{{ route('portfolio') }}" class="btn-default">view all portfolio</a>
                </div>
                <!-- Section Button End -->
            </div>
        </div>

        <div class="row">
            @forelse($portfolios as $index => $portfolio)
                <div class="col-lg-4 col-md-6">
                    <!-- Work Item Start -->
                    <div class="work-item wow fadeInUp" @if($index > 0) data-wow-delay="{{ $index * 0.2 }}s" @endif>
                        <div class="work-image">
                            @if($portfolio->image)
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}">
                            @else
                                <img src="{{ asset('images/work-image-' . ($index + 1) . '.jpg') }}" alt="{{ $portfolio->title }}">
                            @endif
                        </div>
                        <div class="work-body">
                            <div class="work-content">
                                <h3><a href="{{ route('portfolio.detail', $portfolio->slug) }}">{{ $portfolio->title }}</a></h3>
                                <p>{{ $portfolio->short_description ?? $portfolio->overview }}</p>
                            </div>
                            <div class="work-btn">
                                <a href="{{ route('portfolio.detail', $portfolio->slug) }}"><img src="{{ asset('images/arrrow-light.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Work Item End -->
                </div>
            @empty
                <!-- Fallback content when no portfolios are available -->
                <div class="col-lg-4 col-md-6">
                    <div class="work-item wow fadeInUp">
                        <div class="work-image">
                            <img src="{{ asset('images/work-image-1.jpg') }}" alt="">
                        </div>
                        <div class="work-body">
                            <div class="work-content">
                                <h3><a href="#">stellar tech solutions</a></h3>
                                <p>We redesigned Stellar Tech's website to enhance.</p>
                            </div>
                            <div class="work-btn">
                                <a href="#"><img src="{{ asset('images/arrrow-light.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="work-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="work-image">
                            <img src="{{ asset('images/work-image-2.jpg') }}" alt="">
                        </div>
                        <div class="work-body">
                            <div class="work-content">
                                <h3><a href="#">green wave foods</a></h3>
                                <p>We built a user-friendly Shopping platform for Green Wave Foods.</p>
                            </div>
                            <div class="work-btn">
                                <a href="#"><img src="{{ asset('images/arrrow-light.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="work-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="work-image">
                            <img src="{{ asset('images/work-image-3.jpg') }}" alt="">
                        </div>
                        <div class="work-body">
                            <div class="work-content">
                                <h3><a href="#">horizon real estate</a></h3>
                                <p>We helped Horizon Real Estate establish a trusted brand identity.</p>
                            </div>
                            <div class="work-btn">
                                <a href="#"><img src="{{ asset('images/arrrow-light.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Our Work Section End -->
