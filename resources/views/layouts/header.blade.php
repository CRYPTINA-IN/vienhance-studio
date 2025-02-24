<!-- Header Start -->
<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="images/logo.svg" alt="Logo">
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
{{--                            <li class="nav-item submenu"><a class="nav-link" href="{{url('/')}}}">Home</a>--}}
{{--                                <ul>--}}
{{--                                    <li class="nav-item"><a class="nav-link" href="index-2.html">Home - Main</a></li>--}}
{{--                                    <li class="nav-item"><a class="nav-link" href="index-image.html">Home - Image</a></li>--}}
{{--                                    <li class="nav-item"><a class="nav-link" href="index-slider.html">Home - Slider</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                            <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a>
                            <li class="nav-item"><a class="nav-link" href="{{url('/about')}}">About Us</a>
                            <li class="nav-item"><a class="nav-link" href="{{url('/services')}}">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/portfolio')}}">Portfolio</a></li>
{{--                            <li class="nav-item"><a class="nav-link" href="{{url('/blog')}}">Blog</a></li>--}}
                            <li class="nav-item highlighted-menu"><a class="nav-link" href="{{url('/contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- Header Btn Start -->
                    <div class="header-btn">
                        <a href="{{url('/contact')}}" class="btn-default">Contact Us</a>
                    </div>
                    <!-- Header Btn End -->
                </div>
                <!-- Main Menu End -->
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
<!-- Header End -->
