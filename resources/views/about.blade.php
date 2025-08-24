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
                                <img src="{{ asset('images/our-vision-img.png') }}" alt="Our Vision">
                            </figure>
                        </div>
                        <!-- Vision Mission image End -->

                        <!-- Vision Mission Content Start -->
                        <div class="vision-mission-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">our vision</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">Setting New Standards in
                                    <span>Digital Excellence</span>
                                </h2>
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
                                <img src="{{ asset('images/our-mission-img.png') }}" alt="Our Mission">
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

            
        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="team-single-box">
                    <!-- Team About Box Start -->
                    <div class="team-about-box">
                        <!-- Team Single Image Start -->
                        <div class="team-single-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/team-1.jpg') }}" alt="">
                            </figure>

                        </div>
                        <!-- Team Single Image End -->

                        <!-- Team About Contact Start -->
                        <div class="team-about-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime-style-2" data-cursor="-opaque">Vidushi <span>Singh</span></h2>
                                <h3 class="wow fadeInUp">Optimistic, innovative, and determined.</h3>
                                <p class="wow fadeInUp">
Hello! I'm Vidushi, an optimistic, innovative, and determined designer committed to turning creative obsession into powerful business solutions. My passion for design began in childhood, evolving over the years into a relentless pursuit of excellence. This journey led me to challenge my creative knowledge, which paved the way for Vi Enhance.
</p>

<p class="wow fadeInUp">
At Vi Enhance, we believe the most important thing is combining skill with the right mindset. My true passion lies in working with businesses that are committed to making a positive change in our world. My extensive experience has granted me a wealth of knowledge in many areas of design, allowing us to deliver incredible services for your business with big dreams.
</p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Team Contact List Start -->
                            <div class="team-contact-list">
                                <!-- Team Member Box Start -->
                                <div class="team-contact-box wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="icon-box">
                                        <img src="images/icon-team-contact-1.svg" alt="">
                                    </div>

                                    <div class="team-contact-content">
                                        <h3>position</h3>
                                        <p>Founder and CCO </p>
                                    </div>
                                </div>
                                <!-- Team Member Box End -->

                                <!-- Team Member Box Start -->
                                <div class="team-contact-box wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="icon-box">
                                        <img src="images/icon-team-contact-2.svg" alt="">
                                    </div>

                                    <div class="team-contact-content">
                                        <h3>email address</h3>
                                        <p>vidushi@vienhancestudio.com</p>
                                    </div>
                                </div>
                                <!-- Team Member Box End -->

                                

                            </div>
                            <!-- Team Contact List End -->

                            <!-- Team Social Icon Start -->
                            <div class="team-social-icon wow fadeInUp" data-wow-delay="1s">
                                <h3>Connect with me:</h3>
                                <ul>
                                    <li><a href="https://www.facebook.com/vidu.vidushisingh"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://x.com/vidushivie"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/viduvidushisingh/"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="https://www.instagram.com/__vidushii/"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Team Social Icon End -->
                        </div>
                        <!-- Team About Contact End -->
                    </div>
                    <!-- Team About Box End -->


                </div>

            </div>

            <div class="col-lg-12 col-md-12">
                <div class="team-single-box">
                    <!-- Team About Box Start -->
                    <div class="team-about-box">
                       

                        <!-- Team About Contact Start -->
                        <div class="team-about-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime-style-2" data-cursor="-opaque">Aditya Naman <span>Singh</span></h2>
                                <h3 class="wow fadeInUp">Adventurous, passionate, and ambitious.</h3>
                                <p class="wow fadeInUp">Hello! I'm Aditya Naman. I'm a passionate and ambitious person who believes there are no limits to what we can achieve when we work together. My adventurous spirit fuels a constant drive for innovation, pushing us to explore new creative territories for every client.
</p>

<p class="wow fadeInUp">
I love collaborating with people who are committed to growth—in their business, their knowledge, and their positive energy. This shared mindset is what makes our partnerships so successful. I believe that where there is hard work, love for what you do, and genuine inspiration, nothing can go wrong. This is the simple philosophy that guides our team and ensures we deliver a remarkable experience for every client.
</p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Team Contact List Start -->
                            <div class="team-contact-list">
                                <!-- Team Member Box Start -->
                                <div class="team-contact-box wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="icon-box">
                                        <img src="images/icon-team-contact-1.svg" alt="">
                                    </div>

                                    <div class="team-contact-content">
                                        <h3>position</h3>
                                        <p>Co-Founder</p>
                                    </div>
                                </div>
                                <!-- Team Member Box End -->

                                <!-- Team Member Box Start -->
                                <div class="team-contact-box wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="icon-box">
                                        <img src="images/icon-team-contact-2.svg" alt="">
                                    </div>

                                    <div class="team-contact-content">
                                        <h3>email address</h3>
                                        <p>aditya@vienhancestudio.com</p>
                                    </div>
                                </div>
                                <!-- Team Member Box End -->

                              

                               
                            </div>
                            <!-- Team Contact List End -->

                            <!-- Team Social Icon Start -->
                            <div class="team-social-icon wow fadeInUp" data-wow-delay="1s">
                                <h3>Connect with me:</h3>
                                <ul>

                                    <li><a href="https://facebook.com/adityanamansingh"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://x.com/namantastic"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="https://linkedin.com/in/adityanamansingh"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="https://instagram.com/namantastic"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Team Social Icon End -->
                        </div>
                        <!-- Team About Contact End -->

                         <!-- Team Single Image Start -->
                         <div class="team-single-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/team-2.jpg') }}" alt="">
                            </figure>

                        </div>
                        <!-- Team Single Image End -->
                    </div>
                    <!-- Team About Box End -->


                </div>

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
'imageUrl' => 'images/our-faq-img.png',
'imageAlt' => 'FAQ Image'
])

@endsection