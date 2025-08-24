<!-- Our Services Section Start -->
<div class="our-services">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-6">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3>our Services</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Our innovative <span>services</span></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-lg-6">
                <!-- Section Button Start -->
                <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                    <a href="services" class="btn-default">view all services</a>
                </div>
                <!-- Section Button End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Our Services Boxes Start -->
                <div class="our-services-boxes tab-content wow fadeInUp" data-wow-delay="0.25s" id="servicesbox">
                    <!-- Sidebar Our Services Nav start -->
                    <div class="our-services-nav">
                        <ul class="nav nav-tabs" id="servicestab" role="tablist">
                            @foreach($response['services'] as $index => $service)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                                            id="{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}-tab" 
                                            data-bs-toggle="tab" 
                                            data-bs-target="#{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}"
                                            type="button" 
                                            role="tab" 
                                            aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                        <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span> {{ $service['title'] }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Sidebar Our Services Nav End -->

                    @foreach($response['services'] as $index => $service)
                        <!-- Our Service Box Start -->
                        <div class="our-service-box tab-pane fade {{ $index === 0 ? 'show active' : '' }}" 
                             id="{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}" 
                             role="tabpanel">
                            <div class="service-box-image">
                                <figure>
                                    <img src="{{ asset('storage/' . $service['image']) }}" alt="{{ $service['title'] }}">
                                </figure>
                            </div>
                            <div class="service-box-item">
                                <div class="icon-box">
                                
                                    <img src="{{ asset('images/icon-service-1.svg') }}" alt="">
                                </div>
                                <div class="service-box-item-content">
                                    <h3><a href="{{ $service['link'] }}">{{ $service['title'] }}</a></h3>
                                    <p>{{ $service['description'] }}</p>
                                </div>
                                <div class="service-box-item-btn">
                                    <a href="{{ $service['link'] }}" class="readmore-btn">read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- Our Service Box End -->
                    @endforeach

                </div>
                <!-- Our Services Boxes End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Services Section End -->
