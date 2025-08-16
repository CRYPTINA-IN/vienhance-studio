@extends('layouts.web')

@section('content')
<!-- Page Header Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">About our <span>journey</span></h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">about us</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Page About Us Section Start -->
<div class="page-about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- About Image Start -->
                <div class="about-us-img">
                    <figure class="image-anime reveal">
                        <img src="{{ asset('images/about-logo-img.png') }}" alt="">
                    </figure>
                </div>
                <!-- About Image End -->
            </div>

            <div class="col-lg-6">
                <!-- About Us Content Start -->
                <div class="about-us-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">about us</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">A team of <span>creative thinkers</span>
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            Vienhance Studio is a full-service design agency fueled by creativity, innovation, and a
                            commitment to delivering exceptional designs. We focus on branding, web design, and digital
                            experiences that empower businesses to create a strong visual identity.
                        </p>
                    </div>
                    <!-- Section Title End -->

                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <!-- About Us Info List Start -->
                            <div class="about-us-info-list wow fadeInUp" data-wow-delay="0.4s">
                                <ul>
                                    <li>Creativity & Innovation</li>
                                    <li>Client-Centricity</li>
                                    <li>Integrity & Transparency</li>
                                    <li>Strategic Design</li>
                                    <li>Collaborative Process</li>
                                    <li>Quality & Excellence</li>
                                </ul>
                            </div>
                            <!-- About Us Info List End -->
                        </div>
                        <div class="col-md-6">
                            <!-- About Contact Button Start -->
                            <div class="about-contact-now">
                                <a href="{{ route('contact') }}"><img src="{{ asset('images/contact-circle.png') }}" alt=""></a>
                            </div>
                            <!-- About Contact Button End -->
                        </div>
                    </div>
                </div>
                <!-- About Us Content End -->
            </div>
        </div>

        <!-- Use Trusted Clients Component -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Trusted Client Box Start -->
                <div class="trusted-client-box">
                    <!-- Trusted Client Title Start -->
                    <div class="trusted-client-title wow fadeInUp">
                        <h3>trusted by teams at</h3>
                    </div>
                    <!-- Trusted Client Title End -->

                    @include('components.trusted-clients-slider-section')
                </div>
                <!-- Trusted Client Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page About Us Section End -->

<!-- Use CTA Section Component -->
@include('components.cta-section')

<!-- Use Our Achievements Section Component -->
@include('components.our-achievements-section')

<!-- Our Vision Mission Section Start -->
<div class="our-vision-mission bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Vision Mission Box Start -->
                <div class="vision-mission-box">
                    <!-- Vision Mission Item Start -->
                    <div class="vision-mission-item">
                        <!-- Vision Mission image Start -->
                        <div class="vision-mission-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/our-vision-img.jpg') }}" alt="Our Vision">
                            </figure>
                        </div>
                        <!-- Vision Mission image End -->

                        <!-- Vision Mission Content Start -->
                        <div class="vision-mission-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">our vision</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">Setting New Standards in
                                    <span>Digital Excellence</span></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">
                                    At Vienhance Studio, we give clients a distinct market edge by integrating
                                    innovation and design with business objectives. We craft strategic solutions that
                                    capture attention, drive engagement, and establish a strong presence.
                                </p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Vision Mission List Start -->
                            <div class="vision-mission-list wow fadeInUp" data-wow-delay="0.4s">
                                <ul>
                                    <li>Market Edge for Clients</li>
                                    <li>Innovation & Business Integration</li>
                                    <li>Strategic Solutions</li>
                                    <li>Audience Engagement</li>
                                    <li>Digital Excellence</li>
                                </ul>
                            </div>
                            <!-- Vision Mission List End -->
                        </div>
                        <!-- Vision Mission Content End -->
                    </div>
                    <!-- Vision Mission Item End -->

                    <!-- Vision Mission Item Start -->
                    <div class="vision-mission-item">
                        <!-- Vision Mission image Start -->
                        <div class="vision-mission-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/our-mission-img.jpg') }}" alt="Our Mission">
                            </figure>
                        </div>
                        <!-- Vision Mission image End -->

                        <!-- Vision Mission Content Start -->
                        <div class="vision-mission-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">our mission</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">Crafting Impactful <span>Design
                                        Solutions</span></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">
                                    At Vienhance Studio, our mission is to deliver exceptional creative design solutions
                                    that trigger brand engagement and turn our clients' visions into captivating,
                                    accessible realities.
                                </p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Vision Mission List Start -->
                            <div class="vision-mission-list wow fadeInUp" data-wow-delay="0.4s">
                                <ul>
                                    <li>Exceptional Creativity</li>
                                    <li>Brand Engagement</li>
                                    <li>Accessibility</li>
                                    <li>Quality & Integrity</li>
                                    <li>Exceeding Expectations</li>
                                </ul>
                            </div>
                            <!-- Vision Mission List End -->
                        </div>
                        <!-- Vision Mission Content End -->
                    </div>
                    <!-- Vision Mission Item End -->
                </div>
                <!-- Vision Mission Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Vision Mission Section End -->

<!-- Our Team Section Start -->
<div class="our-team">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-8">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">our team</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">The minds behind <span>the magic</span></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-lg-4">
                <!-- Section Button Start -->
                <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                    <a href="#" class="btn-default">all team members</a>
                </div>
                <!-- Section Button End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- Team Member Item Start -->
                <div class="team-item wow fadeInUp">
                    <!-- team Image Start -->
                    <div class="team-image">
                        <a href="#" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/team-1.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- team Image End -->

                    <!-- Team Body Start -->
                    <div class="team-body">
                        <!-- Team Content Start -->
                        <div class="team-content">
                            <h3><a href="#">Joseph g. brown</a></h3>
                        </div>
                        <!-- Team Content End -->

                        <!-- Team Social List Start -->
                        <div class="team-social-list">
                            <span>director</span>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Team Social List End -->
                    </div>
                    <!-- Team Body End -->
                </div>
                <!-- Team Member Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Team Member Item Start -->
                <div class="team-item wow fadeInUp" data-wow-delay="0.2s">
                    <!-- team Image Start -->
                    <div class="team-image">
                        <a href="#" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/team-2.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- team Image End -->

                    <!-- Team Body Start -->
                    <div class="team-body">
                        <!-- Team Content Start -->
                        <div class="team-content">
                            <h3><a href="#">Liam brooks</a></h3>
                        </div>
                        <!-- Team Content End -->

                        <!-- Team Social List Start -->
                        <div class="team-social-list">
                            <span>art director</span>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Team Social List End -->
                    </div>
                    <!-- Team Body End -->
                </div>
                <!-- Team Member Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Team Member Item Start -->
                <div class="team-item wow fadeInUp" data-wow-delay="0.4s">
                    <!-- team Image Start -->
                    <div class="team-image">
                        <a href="#" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/team-3.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- team Image End -->

                    <!-- Team Body Start -->
                    <div class="team-body">
                        <!-- Team Content Start -->
                        <div class="team-content">
                            <h3><a href="#">sophia evans</a></h3>
                        </div>
                        <!-- Team Content End -->

                        <!-- Team Social List Start -->
                        <div class="team-social-list">
                            <span>illustrator</span>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Team Social List End -->
                    </div>
                    <!-- Team Body End -->
                </div>
                <!-- Team Member Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Team Member Item Start -->
                <div class="team-item wow fadeInUp" data-wow-delay="0.6s">
                    <!-- team Image Start -->
                    <div class="team-image">
                        <a href="#" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/team-4.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- team Image End -->

                    <!-- Team Body Start -->
                    <div class="team-body">
                        <!-- Team Content Start -->
                        <div class="team-content">
                            <h3><a href="#">noah bennett</a></h3>
                        </div>
                        <!-- Team Content End -->

                        <!-- Team Social List Start -->
                        <div class="team-social-list">
                            <span>UI/UX designer</span>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Team Social List End -->
                    </div>
                    <!-- Team Body End -->
                </div>
                <!-- Team Member Item End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Team Section End -->

<!-- Use Testimonials Section Component -->
@include('components.testimonials-section')

@php
    $faqs = [
        [
            'question' => 'Who are your typical clients?',
            'answer' => 'We partner with startups, growing SMEs, and established corporations who value strategic design and want to elevate their brand, drive engagement, and achieve measurable business results.'
        ],
        [
            'question' => 'How long does a typical project take?',
            'answer' => 'Timelines vary by scope and complexity. Branding projects usually take 2–3 weeks, while UI/UX or website designs can take 2–4+ weeks. A detailed timeline will be shared after the initial consultation.'
        ],
        [
            'question' => 'What is your pricing structure?',
            'answer' => 'We offer project-based fixed fees for defined scopes and custom agreements for ongoing collaborations. All pricing is transparent with no hidden costs. A detailed proposal is provided after understanding your needs.'
        ],
        [
            'question' => 'Can you work with existing brand guidelines?',
            'answer' => 'Yes! We ensure consistency with your existing guidelines while enhancing and evolving your brand.'
        ],
        [
            'question' => 'How do we get started with Vienhance Studio?',
            'answer' => 'Reach out via our contact form, email, or phone. We\'ll schedule a consultation to discuss your project, then provide a tailored proposal with scope, timeline, and investment.'
        ]
    ];
@endphp

@include('components.our-faqs-section', [
    'faqs' => $faqs,
    'accordionId' => 'about',
    'showButton' => false,
    'buttonUrl' => 'faqs.html',
    'buttonText' => 'view all FAQ',
    'imageUrl' => 'images/our-faq-img.jpg',
    'imageAlt' => 'FAQ Image'
])

@endsection