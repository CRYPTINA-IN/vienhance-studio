@extends('layouts.web')
@section('content')

    <!-- Hero Section Start -->
    <div class="hero hero-slider-layout">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Hero Slide Start -->
                <div class="swiper-slide">
                    <div class="hero-slide slide-1">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <!-- Hero Content Start -->
                                    <div class="hero-content">
                                        <!-- Section Title Start -->
                                        <div class="section-title">
                                            <h1 class="text-anime-style-2" data-cursor="-opaque">Where
                                                <span>creativity</span>Meets Purpose
                                            </h1>
                                            <p class="wow fadeInUp" data-wow-delay="0.2s"><strong>Creating Timeless,
                                                    Impactful, and User-Centric Experiences </strong></p>
                                            <p class="wow fadeInUp" data-wow-delay="0.2s"> We innovate, aesthetic and
                                                optimize to develop seamless digital experiences. Every brand has a story,
                                                and we tell it with bold, intuitive, and visually appealing design. </p>
                                        </div>
                                        <!-- Section Title End -->

                                        <!-- Hero Button Start -->
                                        <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                                            <a href="{{ route('portfolio') }}" class="btn-default">view our portfolio</a>
                                        </div>
                                        <!-- Hero Button End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero Slide End -->

            </div>
        </div>
    </div>
    <!-- Hero Section End -->



    <!-- Trusted Clients Section Start -->
    <div class="trusted-clients bg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Trusted Client Box Start -->
                    <div class="trusted-client-box">
                        <!-- Trusted Client Title Start -->
                        <div class="trusted-client-title">
                            <h3>trusted by teams at</h3>
                        </div>
                        <!-- Trusted Client Title End -->

                        <!-- Trusted Clients Slider Start -->
                        <div class="trusted-clients-slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <!-- Trusted Client Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="trusted-client-logo">
                                            <img src="images/clients/client-1.png" alt="">
                                        </div>
                                    </div>
                                    <!-- Trusted Client Logo End -->

                                    <!-- Trusted Client Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="trusted-client-logo">
                                            <img src="images/clients/client-2.png" alt="">
                                        </div>
                                    </div>
                                    <!-- Trusted Client Logo End -->

                                    <!-- Trusted Client Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="trusted-client-logo">
                                            <img src="images/clients/client-3.png" alt="">
                                        </div>
                                    </div>
                                    <!-- Trusted Client Logo End -->

                                    <!-- Trusted Client Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="trusted-client-logo">
                                            <img src="images/clients/client-4.png" alt="">
                                        </div>
                                    </div>
                                    <!-- Trusted Client Logo End -->

                                    <!-- Trusted Client Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="trusted-client-logo">
                                            <img src="images/clients/client-5.png" alt="">
                                        </div>
                                    </div>
                                    <!-- Trusted Client Logo End -->

                                    <!-- Trusted Client Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="trusted-client-logo">
                                            <img src="images/clients/client-6.png" alt="">
                                        </div>
                                    </div>
                                    <!-- Trusted Client Logo End -->
                                </div>
                            </div>
                        </div>
                        <!-- Trusted Clients Slider End -->
                    </div>
                    <!-- Trusted Client Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Trusted Clients Section End -->




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
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="01-tab" data-bs-toggle="tab" data-bs-target="#01"
                                        type="button" role="tab" aria-selected="true"><span>01</span> Digital Experience Design & UI/UX</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="02-tab" data-bs-toggle="tab" data-bs-target="#02"
                                        type="button" role="tab" aria-selected="false"><span>02</span> Identity Design &
                                        Branding</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="03-tab" data-bs-toggle="tab" data-bs-target="#03"
                                        type="button" role="tab" aria-selected="false"><span>03</span> Graphic Design &
                                        Illustration</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="04-tab" data-bs-toggle="tab" data-bs-target="#04"
                                        type="button" role="tab" aria-selected="false"><span>04</span> Marketing and Print
                                        Materials</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="05-tab" data-bs-toggle="tab" data-bs-target="#05"
                                        type="button" role="tab" aria-selected="false"><span>05</span> Design for Content
                                        and Social Media</button>
                                </li>
                            </ul>
                        </div>
                        <!-- Sidebar Our Services Nav End -->



                        <!-- Our Service Box Start -->
                        <div class="our-service-box tab-pane fade show active" id="01" role="tabpanel">
                            <div class="service-box-image">
                                <figure>
                                    <img src="images/service-image-1.jpg" alt="">
                                </figure>
                            </div>
                            <div class="service-box-item">
                                <div class="icon-box">
                                    <img src="images/icon-service-1.svg" alt="">
                                </div>
                                <div class="service-box-item-content">
                                    <h3><a href="services">Digital Experience Design & UI/UX</a></h3>
                                    <p>We design very simple and easy to use, attractive digital experiences. We pay much
                                        attention to the ease of use, simplicity of the navigation and the appearance of the
                                        products we develop, so that each of them could enhance the user’s experience.</p>
                                </div>
                                <div class="service-box-item-btn">
                                    <a href="services" class="readmore-btn">read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- Our Service Box End -->

                        <!-- Our Service Box Start -->
                        <div class="our-service-box tab-pane fade" id="02" role="tabpanel">
                            <div class="service-box-image">
                                <figure>
                                    <img src="images/service-image-2.jpg" alt="">
                                </figure>
                            </div>
                            <div class="service-box-item">
                                <div class="icon-box">
                                    <img src="images/icon-service-1.svg" alt="">
                                </div>
                                <div class="service-box-item-content">
                                    <h3><a href="services">Identity Design & Branding</a></h3>
                                    <p>A good brand is not only a logo, it is a promise, a personality and a story. We help
                                        companies build powerful and recognizable brands with distinctive logos, homogeneous
                                        visual identities and appropriately developed brand narratives.</p>
                                </div>
                                <div class="service-box-item-btn">
                                    <a href="services" class="readmore-btn">read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- Our Service Box End -->

                        <!-- Our Service Box Start -->
                        <div class="our-service-box tab-pane fade" id="03" role="tabpanel">
                            <div class="service-box-image">
                                <figure>
                                    <img src="images/service-image-3.jpg" alt="">
                                </figure>
                            </div>
                            <div class="service-box-item">
                                <div class="icon-box">
                                    <img src="images/icon-service-1.svg" alt="">
                                </div>
                                <div class="service-box-item-content">
                                    <h3><a href="services">Graphic Design & Illustration</a></h3>
                                    <p>It is easier to understand things with pictures than with words and we employ
                                        original icons, appealing visuals and custom illustrations to bring your ideas to
                                        life. Our designs not only complete your brand but also give it a face, a voice and
                                        a feel.</p>
                                </div>
                                <div class="service-box-item-btn">
                                    <a href="services" class="readmore-btn">read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- Our Service Box End -->

                        <!-- Our Service Box Start -->
                        <div class="our-service-box tab-pane fade" id="04" role="tabpanel">
                            <div class="service-box-image">
                                <figure>
                                    <img src="images/service-image-4.jpg" alt="">
                                </figure>
                            </div>
                            <div class="service-box-item">
                                <div class="icon-box">
                                    <img src="images/icon-service-1.svg" alt="">
                                </div>
                                <div class="service-box-item-content">
                                    <h3><a href="services">Marketing and Print Materials</a></h3>
                                    <p>We produce designs that will capture people’s attention, from impressive brochures
                                        and beautiful packaging to sharp flyers and publications. Each of the elements has
                                        been developed specifically to meet your communication objectives and to capture the
                                        attention of your audience.</p>
                                </div>
                                <div class="service-box-item-btn">
                                    <a href="services" class="readmore-btn">read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- Our Service Box End -->

                        <!-- Our Service Box Start -->
                        <div class="our-service-box tab-pane fade" id="05" role="tabpanel">
                            <div class="service-box-image">
                                <figure>
                                    <img src="images/service-image-5.jpg" alt="">
                                </figure>
                            </div>
                            <div class="service-box-item">
                                <div class="icon-box">
                                    <img src="images/icon-service-1.svg" alt="">
                                </div>
                                <div class="service-box-item-content">
                                    <h3><a href="services">Design for Content and Social Media</a></h3>
                                    <p>Designs are kings in a world where online presence is key. To help you keep your
                                        audience engaged, stand out from the crowd and grow your following, we develop
                                        exciting content templates, attention-grabbing social media creatives and visually
                                        consistent brand content.</p>
                                </div>
                                <div class="service-box-item-btn">
                                    <a href="services" class="readmore-btn">read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- Our Service Box End -->



                    </div>
                    <!-- Our Services Boxes End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

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
                        <a href="portfolio" class="btn-default">view all portfolio</a>
                    </div>
                    <!-- Section Button End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Work Item Start -->
                    <div class="work-item wow fadeInUp">
                        <div class="work-image">
                            <a href="portfolio-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/work-image-1.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="work-body">
                            <div class="work-content">
                                <h3><a href="portfolio-single">stellar tech solutions</a></h3>
                                <p>We redesigned Stellar Tech's website to enhance.</p>
                            </div>
                            <div class="work-btn">
                                <a href="portfolio-single"><img src="images/arrrow-light.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Work Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Work Item Start -->
                    <div class="work-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="work-image">
                            <a href="portfolio-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/work-image-2.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="work-body">
                            <div class="work-content">
                                <h3><a href="portfolio-single">green wave foods</a></h3>
                                <p>We built a user-friendly Shopping platform for Green Wave Foods.</p>
                            </div>
                            <div class="work-btn">
                                <a href="portfolio-single"><img src="images/arrrow-light.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Work Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Work Item Start -->
                    <div class="work-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="work-image">
                            <a href="portfolio-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/work-image-3.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="work-body">
                            <div class="work-content">
                                <h3><a href="portfolio-single">horizon real estate</a></h3>
                                <p>We helped Horizon Real Estate establish a trusted brand identity.</p>
                            </div>
                            <div class="work-btn">
                                <a href="portfolio-single"><img src="images/arrrow-light.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Work Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Work Section End -->

    <!-- Creative Tools Section Start -->
    <div class="creative-tools">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-9">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">creative toolkit</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Our toolbox for <span>innovation</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-3">
                    <!-- Section Button Start -->
                    <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                        <a href="contact" class="btn-default">let's get started !</a>
                    </div>
                    <!-- Section Button End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Creative Tools Box Start -->
                    <div class="creative-tools-box">
                        <!-- Creative Tool Item Start -->
                        <div class="creative-tool-item wow fadeInUp">
                            <div class="icon-box">
                                <img src="images/icon-creative-tools-1.svg" alt="">
                            </div>
                            <div class="creative-tool-item-content">
                                <h3>figma</h3>
                                <p>Design tool</p>
                            </div>
                        </div>
                        <!-- Creative Tool Item End -->

                        <!-- Creative Tool Item Start -->
                        <div class="creative-tool-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="images/icon-creative-tools-2.svg" alt="">
                            </div>
                            <div class="creative-tool-item-content">
                                <h3>framer</h3>
                                <p>Design tool</p>
                            </div>
                        </div>
                        <!-- Creative Tool Item End -->

                        <!-- Creative Tool Item Start -->
                        <div class="creative-tool-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="images/icon-creative-tools-3.svg" alt="">
                            </div>
                            <div class="creative-tool-item-content">
                                <h3>illustrator</h3>
                                <p>Design tool</p>
                            </div>
                        </div>
                        <!-- Creative Tool Item End -->

                        <!-- Creative Tool Item Start -->
                        <div class="creative-tool-item wow fadeInUp" data-wow-delay="0.6s">
                            <div class="icon-box">
                                <img src="images/icon-creative-tools-4.svg" alt="">
                            </div>
                            <div class="creative-tool-item-content">
                                <h3>adobe xd</h3>
                                <p>Design tool</p>
                            </div>
                        </div>
                        <!-- Creative Tool Item End -->

                        <!-- Creative Tool Item Start -->
                        <div class="creative-tool-item wow fadeInUp" data-wow-delay="0.8s">
                            <div class="icon-box">
                                <img src="images/icon-creative-tools-5.svg" alt="">
                            </div>
                            <div class="creative-tool-item-content">
                                <h3>indesign</h3>
                                <p>Design tool</p>
                            </div>
                        </div>
                        <!-- Creative Tool Item End -->

                        <!-- Creative Tool Item Start -->
                        <div class="creative-tool-item wow fadeInUp" data-wow-delay="1s">
                            <div class="icon-box">
                                <img src="images/icon-creative-tools-6.svg" alt="">
                            </div>
                            <div class="creative-tool-item-content">
                                <h3>photoshop</h3>
                                <p>Design tool</p>
                            </div>
                        </div>
                        <!-- Creative Tool Item End -->

                        <!-- Creative Tool Item Start -->
                        <div class="creative-tool-item wow fadeInUp" data-wow-delay="1.2s">
                            <div class="icon-box">
                                <img src="images/icon-creative-tools-7.svg" alt="">
                            </div>
                            <div class="creative-tool-item-content">
                                <h3>lightroom</h3>
                                <p>Design tool</p>
                            </div>
                        </div>
                        <!-- Creative Tool Item End -->

                        <!-- Creative Tool Item Start -->
                        <div class="creative-tool-item wow fadeInUp" data-wow-delay="1.4s">
                            <div class="icon-box">
                                <img src="images/icon-creative-tools-8.svg" alt="">
                            </div>
                            <div class="creative-tool-item-content">
                                <h3>incopy</h3>
                                <p>Design tool</p>
                            </div>
                        </div>
                        <!-- Creative Tool Item End -->
                    </div>
                    <!-- Creative Tools Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Creative Tools Section End -->

    <!-- How It Work Section Start-->
    <div class="how-it-work bg-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">creative toolkit</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Our methodology for <span>success</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-4">
                    <!-- Section Button Start -->
                    <div class="contact-now-circle">
                        <a href="contact"><img src="images/contact-circle.png" alt=""></a>
                    </div>
                    <!-- Section Button End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- How It Work Images Start-->
                    <div class="how-it-work-images">
                        <!-- How Work Image Circle Start-->
                        <div class="how-work-image-circle">
                            <img src="images/how-work-image-circle.png" alt="">
                        </div>
                        <!-- How Work Image Circle End-->

                        <!-- How It Work Image Start-->
                        <div class="how-it-work-image">
                            <figure class="image-anime">
                                <img src="images/how-it-work-image.jpg" alt="">
                            </figure>
                        </div>
                        <!-- How It Work Image End-->
                    </div>
                    <!-- How It Work Images End-->
                </div>

                <div class="col-lg-6">
                    <!-- Work FAQ Accordion Start -->
                    <div class="work-faq-accordion" id="workaccordion">
                        <!-- Work FAQ Item Start -->
                        <div class="work-accordion-item wow fadeInUp">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    01. Discovery & Strategy
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                                data-bs-parent="#workaccordion">
                                <div class="accordion-body">
                                    <p>We begin by getting to know you and your brand. Through in-depth conversations,
                                        research, and analysis.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Work FAQ Item End -->

                        <!-- Work FAQ Item Start -->
                        <div class="work-accordion-item wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    02. Concept Development
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                data-bs-parent="#workaccordion">
                                <div class="accordion-body">
                                    <p>We begin by getting to know you and your brand. Through in-depth conversations,
                                        research, and analysis.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Work FAQ Item End -->

                        <!-- Work FAQ Item Start -->
                        <div class="work-accordion-item wow fadeInUp" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    03. Design & Iteration
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                                data-bs-parent="#workaccordion">
                                <div class="accordion-body">
                                    <p>We begin by getting to know you and your brand. Through in-depth conversations,
                                        research, and analysis.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Work FAQ Item End -->

                        <!-- Work FAQ Item Start -->
                        <div class="work-accordion-item wow fadeInUp" data-wow-delay="0.6s">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    04. Development & Execution
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                                data-bs-parent="#workaccordion">
                                <div class="accordion-body">
                                    <p>We begin by getting to know you and your brand. Through in-depth conversations,
                                        research, and analysis.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Work FAQ Item End -->
                    </div>
                    <!-- Work FAQ Accordion End -->
                </div>
            </div>
        </div>
    </div>
    <!-- How It Work Section End-->

    <!-- Our Achievements Section Start -->
    <div class="our-achievements">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <!-- Our Achievements Content Start -->
                    <div class="our-achievements-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">our achievements</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Proud moments & <span>milestones</span>
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">We're a full-service design agency specializing in
                                branding, web design, and creative strategies that elevate businesses.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Our Achievements Button Start -->
                        <div class="achievements-content-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="contact" class="btn-default">let's get started !</a>
                        </div>
                        <!-- Our Achievements Button End -->
                    </div>
                    <!-- Our Achievements Content End -->
                </div>

                <div class="col-lg-7">
                    <!-- Our Achievements Box Start -->
                    <div class="our-achievements-box wow fadeInUp">
                        <!-- Achievements Item Start -->
                        <div class="achievements-item">
                            <h3>2015 - 2016</h3>
                            <h2>Best Design Award</h2>
                            <p>We begin by getting to know you and your brand. Through in-depth.</p>
                        </div>
                        <!-- Achievements Item End -->

                        <!-- Achievements Item Start -->
                        <div class="achievements-item">
                            <h3>2016 - 2017</h3>
                            <h2>Dribble Winner</h2>
                            <p>We begin by getting to know you and your brand. Through in-depth.</p>
                        </div>
                        <!-- Achievements Item End -->

                        <!-- Achievements Item Start -->
                        <div class="achievements-item">
                            <h3>2017 - 2018</h3>
                            <h2>Design Of The Year</h2>
                            <p>We begin by getting to know you and your brand. Through in-depth.</p>
                        </div>
                        <!-- Achievements Item End -->

                        <!-- Achievements Item Start -->
                        <div class="achievements-item">
                            <h3>2017 - 2018</h3>
                            <h2>Graphic Design Winner</h2>
                            <p>We begin by getting to know you and your brand. Through in-depth.</p>
                        </div>
                        <!-- Achievements Item End -->

                        <!-- Achievements Item Start -->
                        <div class="achievements-item">
                            <h3>2018 - 2019</h3>
                            <h2>Awward Winner</h2>
                            <p>We begin by getting to know you and your brand. Through in-depth.</p>
                        </div>
                        <!-- Achievements Item End -->

                        <!-- Achievements Item Start -->
                        <div class="achievements-item">
                            <h3>2019 - 2020</h3>
                            <h2>Best Jury Award</h2>
                            <p>We begin by getting to know you and your brand. Through in-depth.</p>
                        </div>
                        <!-- Achievements Item End -->
                    </div>
                    <!-- Our Achievements Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Achievements Section End -->

    <!-- CTA Section Start -->
    <div class="cta-section bg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- CTA Box Start -->
                    <div class="cta-box">
                        <div class="cta-counter-content-box">
                            <!-- CTA Box Content Start -->
                            <div class="cta-box-content wow fadeInUp">
                                <p>We specialize in delivering innovative and impactful design solutions that elevate brands
                                    and drive results. From digital experiences to print media, our team of creative
                                    professionals is dedicated to transforming ideas into compelling visual stories that
                                    resonate with audiences. With a focus on creativity, strategy, and client collaboration.
                                </p>
                            </div>
                            <!-- CTA Box Content End -->

                            <!-- CTA Counter Box Start -->
                            <div class="cta-counter-box">
                                <!-- CTA Counter Item Start -->
                                <div class="cta-counter-item">
                                    <h3><span class="counter">45</span>+</h3>
                                    <p>project completed</p>
                                </div>
                                <!-- CTA Counter Item End -->

                                <!-- CTA Counter Item Start -->
                                <div class="cta-counter-item">
                                    <h3><span class="counter">15</span>+</h3>
                                    <p>years of experience</p>
                                </div>
                                <!-- CTA Counter Item End -->

                                <!-- CTA Counter Item Start -->
                                <div class="cta-counter-item">
                                    <h3><span class="counter">100</span>%</h3>
                                    <p>client satisfaction</p>
                                </div>
                                <!-- CTA Counter Item End -->
                            </div>
                            <!-- CTA Counter Box End -->
                        </div>

                        <!-- CTA Contact Circle Start -->
                        <div class="cta-contact-circle">
                            <a href="contact"><img src="images/cta-contact-circle.png" alt=""></a>
                        </div>
                        <!-- CTA Contact Circle End -->
                    </div>
                    <!-- CTA Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Section End -->

    <!-- Our Team Section Start -->
    <div class="our-team">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our team</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">The Minds Behind <span>the Magic</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-4">
                    <!-- Section Button Start -->
                    <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                        <a href="team" class="btn-default">all team members</a>
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
                            <a href="team-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/team-1.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- team Image End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <!-- Team Content Start -->
                            <div class="team-content">
                                <h3><a href="team-single">Joseph g. brown</a></h3>
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
                            <a href="team-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/team-2.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- team Image End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <!-- Team Content Start -->
                            <div class="team-content">
                                <h3><a href="team-single">Liam brooks</a></h3>
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
                            <a href="team-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/team-3.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- team Image End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <!-- Team Content Start -->
                            <div class="team-content">
                                <h3><a href="team-single">sophia evans</a></h3>
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
                            <a href="team-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/team-4.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- team Image End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <!-- Team Content Start -->
                            <div class="team-content">
                                <h3><a href="team-single">noah bennett</a></h3>
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

    <!-- Our Testimonial Section Start -->
    <div class="our-testimonial bg-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">testimonials</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Hear from our <span>happy clients</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Testimonial Slider Start -->
                    <div class="testimonial-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="testimonial-logo-img">
                                                <img src="images/client-logo-1.svg" alt="">
                                            </div>
                                            <div class="testimonial-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>The creativity professionalism shown by Rovex exceeded our expectations Their
                                                design transformed brand and the results speak for themselves.</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-1.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>arlene mcCoy</h3>
                                                <p>Co Founder</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="testimonial-logo-img">
                                                <img src="images/client-logo-2.svg" alt="">
                                            </div>
                                            <div class="testimonial-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>Working with Rovex has been an absolute pleasure. Their creativity and
                                                attention to detail truly brought our vision to life.</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-2.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>Esther Howard</h3>
                                                <p>Director</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="testimonial-logo-img">
                                                <img src="images/client-logo-4.svg" alt="">
                                            </div>
                                            <div class="testimonial-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>We couldn't be happier with the final result and have received glowing
                                                feedback from both our team and users. Rovex is a true professional.</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-3.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>Arlene McCoy</h3>
                                                <p>CEO</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="testimonial-logo-img">
                                                <img src="images/client-logo-5.svg" alt="">
                                            </div>
                                            <div class="testimonial-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>Working with Rovex has been an absolute pleasure. Their creativity and
                                                attention to detail truly brought our vision to life.</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-4.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>nai jex</h3>
                                                <p>Director</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->
                            </div>
                            <div class="testimonial-pagination"></div>
                        </div>
                    </div>
                    <!-- Testimonial Slider End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Testimonial Section End -->

    <!-- Our Blog Section Start -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">blog</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Latest insights & <span>inspiration</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-4">
                    <!-- Section Button Start -->
                    <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                        <a href="blog" class="btn-default">view all post</a>
                    </div>
                    <!-- Section Button End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image">
                            <a href="blog-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/post-1.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Item Body Start -->
                        <div class="post-item-body">
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="blog-single">The Role of Color Psychology in Branding</a></h2>
                            </div>
                            <!-- Post Item Content End -->

                            <!-- Post Item Footer Start -->
                            <div class="post-item-footer">
                                <!-- Post Item Tag Start -->
                                <div class="post-item-meta">
                                    <ul>
                                        <li>27 dec, 2024</li>
                                    </ul>
                                </div>
                                <!-- Post Item Tag End -->

                                <!-- Post Item Readmore Button Start-->
                                <div class="post-item-btn">
                                    <a href="blog-single" class="readmore-btn">read more</a>
                                </div>
                                <!-- Post Item Readmore Button End-->
                            </div>
                            <!-- Post Item Footer End -->
                        </div>
                        <!-- Post Item Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image">
                            <a href="blog-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/post-2.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Item Body Start -->
                        <div class="post-item-body">
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="blog-single">How color Shades and Brand Identity</a></h2>
                            </div>
                            <!-- Post Item Content End -->

                            <!-- Post Item Footer Start -->
                            <div class="post-item-footer">
                                <!-- Post Item Tag Start -->
                                <div class="post-item-meta">
                                    <ul>
                                        <li>27 dec, 2024</li>
                                    </ul>
                                </div>
                                <!-- Post Item Tag End -->

                                <!-- Post Item Readmore Button Start-->
                                <div class="post-item-btn">
                                    <a href="blog-single" class="readmore-btn">read more</a>
                                </div>
                                <!-- Post Item Readmore Button End-->
                            </div>
                            <!-- Post Item Footer End -->
                        </div>
                        <!-- Post Item Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image">
                            <a href="blog-single" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="images/post-3.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Item Body Start -->
                        <div class="post-item-body">
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="blog-single">Breaking Down the Design Process From Concept</a></h2>
                            </div>
                            <!-- Post Item Content End -->

                            <!-- Post Item Footer Start -->
                            <div class="post-item-footer">
                                <!-- Post Item Tag Start -->
                                <div class="post-item-meta">
                                    <ul>
                                        <li>27 dec, 2024</li>
                                    </ul>
                                </div>
                                <!-- Post Item Tag End -->

                                <!-- Post Item Readmore Button Start-->
                                <div class="post-item-btn">
                                    <a href="blog-single" class="readmore-btn">read more</a>
                                </div>
                                <!-- Post Item Readmore Button End-->
                            </div>
                            <!-- Post Item Footer End -->
                        </div>
                        <!-- Post Item Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Blog Section End -->



@endsection