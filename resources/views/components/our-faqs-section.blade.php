<!-- Our Faqs Section Start -->
<div class="our-faqs">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-9">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">{{ $title ?? "FAQ's" }}</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">
                    {!! $subtitle ?? "Everything you <span>need to know</span>" !!}</h2>
                </div>
                <!-- Section Title End -->
            </div>

            @if(isset($showButton) && $showButton)
            <div class="col-lg-3">
                <!-- Section Button Start -->
                <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                    <a href="{{ $buttonUrl ?? 'faqs.html' }}" class="btn-default">{{ $buttonText ?? 'view all FAQ' }}</a>
                </div>
                <!-- Section Button End -->
            </div>
            @endif
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Our FAQ Section Start -->
                <div class="our-faq-section">
                    <!-- FAQ Accordion Start -->
                    <div class="faq-accordion" id="faq-accordion-{{ $accordionId ?? 'default' }}">
                        @if(isset($faqs) && is_array($faqs))
                            @foreach($faqs as $index => $faq)
                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" @if($index > 0) data-wow-delay="{{ $index * 0.2 }}s" @endif>
                                    <h2 class="accordion-header" id="heading-{{ $accordionId ?? 'default' }}-{{ $index }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $accordionId ?? 'default' }}-{{ $index }}" 
                                            aria-expanded="false" 
                                            aria-controls="collapse-{{ $accordionId ?? 'default' }}-{{ $index }}">
                                            {{ $faq['question'] }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $accordionId ?? 'default' }}-{{ $index }}" 
                                         class="accordion-collapse collapse" 
                                         aria-labelledby="heading-{{ $accordionId ?? 'default' }}-{{ $index }}"
                                         data-bs-parent="#faq-accordion-{{ $accordionId ?? 'default' }}">
                                        <div class="accordion-body">
                                            <p>{{ $faq['answer'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->
                            @endforeach
                        @else
                            <!-- Default FAQ Items if no array is provided -->
                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp">
                                <h2 class="accordion-header" id="heading-default-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-default-1" aria-expanded="false" aria-controls="collapse-default-1">
                                        Who are your typical clients?
                                    </button>
                                </h2>
                                <div id="collapse-default-1" class="accordion-collapse collapse" aria-labelledby="heading-default-1"
                                    data-bs-parent="#faq-accordion-default">
                                    <div class="accordion-body">
                                        <p>We partner with startups, growing SMEs, and established corporations who value
                                            strategic design and want to elevate their brand, drive engagement, and achieve
                                            measurable business results.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                <h2 class="accordion-header" id="heading-default-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-default-2" aria-expanded="false" aria-controls="collapse-default-2">
                                        How long does a typical project take?
                                    </button>
                                </h2>
                                <div id="collapse-default-2" class="accordion-collapse collapse" aria-labelledby="heading-default-2"
                                    data-bs-parent="#faq-accordion-default">
                                    <div class="accordion-body">
                                        <p>Timelines vary by scope and complexity. Branding projects usually take 2–3 weeks,
                                            while UI/UX or website designs can take 2–4+ weeks. A detailed timeline will be
                                            shared after the initial consultation.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->
                        @endif
                    </div>
                    <!-- FAQ Accordion End -->
                </div>
                <!-- Our FAQ Section End -->
            </div>

            <div class="col-lg-6">
                <!-- Our Faqs Image Start -->
                <div class="our-faqs-img">
                    <figure class="image-anime reveal">
                        <img src="{{ $imageUrl ?? 'images/our-faq-img.jpg' }}" alt="{{ $imageAlt ?? 'FAQ Image' }}">
                    </figure>
                </div>
                <!-- Our Faqs Image End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Faqs Section End -->
