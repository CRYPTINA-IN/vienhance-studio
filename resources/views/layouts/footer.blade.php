<!-- Floating Social Media Call Buttons Start -->
<div class="callbtn">
    <a href="https://www.facebook.com/Vienhancestudio/" class="fa-brands fa-facebook-f" aria-hidden="true"></a>
    <a href="https://wa.me/918057911777" class="fa-brands fa-whatsapp"  aria-hidden="true"></a>
    <a href="https://www.instagram.com/vienhancestudio/" class="fa-brands fa-instagram"  aria-hidden="true"></a>
</div>
<!-- Floating Social Media Call Buttons End -->
<!-- Footer Section Start -->
<footer class="footer-section">
    <div class="footer-box bg-section">
        <div class="footer-title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Footer Title Content Start -->
                        <div class="footer-title-content">
                            <h2><a href="{{ route('contact') }}" data-cursor-text="Connect">Let's Connect</a></h2>
                        </div>
                        <!-- Footer Title Content End -->
                        
                    </div>
                </div>
            </div>
        </div>
        @if(isset($footerSeoPages) && $footerSeoPages->count())
                        <div class="footer-marquee">
                            <div class="marquee-track">
                                @foreach($footerSeoPages as $page)
                                    <a href="{{ $page['url'] }}" class="marquee-link">{{ $page['title'] }}</a>
                                    <span class="marquee-sep">•</span>
                                @endforeach
                            </div>
                        </div>
                        
                        @endif

        <!-- Main Footer Start -->
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- About Footer Start -->
                        <div class="about-footer">
                            <!-- Footer Logo Start -->
                            <div class="footer-logo">
                                <img src="{{ asset('images/footer-logo.svg') }}" alt="">
                            </div>
                            <!-- Footer Logo End -->

                            <!-- About Footer Content Start -->
                            <div class="about-footer-content">
                                <p>At Vi Enhance, we endorse your business to outshine and widespread your brand messages by creating impressive visual designs. we are ambitious, passionate, and creative souls dedicated to each and every project so that your digital presence looks alluring and interactive while paying close attention to each and every corner of the projects.</p>
                            </div>
                            <!-- Footer Social Links Start -->
                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="https://www.facebook.com/Vienhancestudio/"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://wa.me/918057911777"><i class="fa-brands fa-whatsapp"></i></a></li>
                                    <li><a href="https://www.instagram.com/vienhancestudio/"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Footer Social Links End -->

                        </div>
                        <!-- About Footer End -->
                    </div>

                    <div class="col-lg-2 col-md-3 col-6">
                        <!-- About Links Start -->
                        <div class="footer-links">
                            <h3>quick links</h3>
                            <ul>
                                <li><a href="{{ route('home') }}">home</a></li>
                                <li><a href="{{ route('about') }}">about us</a></li>
                                <li><a href="{{ route('portfolio') }}">our portfolio</a></li>
                                <li><a href="{{ route('services') }}">our services</a></li>
                            </ul>
                        </div>
                        <!-- About Links End -->
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <!-- About Links Start -->
                        <div class="footer-links">
                            <h3>our services</h3>
                           
                            <ul>
                                @foreach($response['services'] as $service)
                                    <li><a href="{{ $service['link'] }}">{{ $service['title'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- About Links End -->
                    </div>

                    <div class="col-lg-3 col-md-5">
                        <!-- About Links Start -->
                        <div class="footer-contact">
                            <h3>contact info</h3>
                            <!-- Footer Contact Details Start -->
                            <div class="footer-contact-details">
                                <!-- Footer Info Box Start -->
                                <div class="footer-info-box">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="footer-info-box-content">
                                        <p><a href="tel:+918057911777">+91 80579 11777</a></p>
                                    </div>
                                </div>
                                <!-- Footer Info Box End -->

                                <!-- Footer Info Box Start -->
                                <div class="footer-info-box">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="footer-info-box-content">
                                        <p><a href="mailto:hello@vienhancestudio.com">hello@vienhancestudio.com</a></p>
                                    </div>
                                </div>
                                <!-- Footer Info Box End -->

                                <!-- Footer Info Box Start -->
                                <div class="footer-info-box">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="footer-info-box-content">
                                        <p>Roorkee, Uttrakhand, <br> India - 247667</p>
                                    </div>
                                </div>
                                <!-- Footer Info Box End -->
                            </div>
                            <!-- Footer Contact Details End -->
                        </div>
                        <!-- About Links End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Footer End -->

        <!-- Footer Copyright Section Start -->
        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <!-- Footer Copyright Start -->
                        <div class="footer-copyright-text">
                            <p>Copyright © {{ date('Y') }} All Rights Reserved.</p>
                        </div>
                        <!-- Footer Copyright End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Copyright Section End -->
    </div>
</footer>
<!-- Footer Section End -->

<!-- Jquery Library File -->
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<!-- Bootstrap js file -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Validator js file -->
<script src="{{ asset('js/validator.min.js') }}"></script>
<!-- SlickNav js file -->
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<!-- Swiper js file -->
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<!-- Counter js file -->
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<!-- Isotop js file -->
<script src="{{ asset('js/isotope.min.js') }}"></script>
<!-- Magnific js file -->
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<!-- SmoothScroll -->
<script src="{{ asset('js/SmoothScroll.js') }}"></script>
<!-- Parallax js -->
<script src="{{ asset('js/parallaxie.js') }}"></script>
<!-- MagicCursor js file -->
<script src="{{ asset('js/gsap.min.js') }}"></script>
<script src="{{ asset('js/magiccursor.js') }}"></script>
<!-- Text Effect js file -->
<script src="{{ asset('js/SplitText.js') }}"></script>
<script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
<!-- YTPlayer js File -->
<script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>
<!-- Wow js file -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!-- Main Custom js file -->
<script src="{{ asset('js/function.js') }}"></script>

</body>
</html>
