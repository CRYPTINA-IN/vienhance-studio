<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="author" content="Vienhance Studio">
    
    <!-- SEO Meta Tags -->
    @php
        // Get meta tags directly from the middleware logic
        $routeName = request()->route()->getName();
        $path = request()->path();
        
        // Check for blog detail route
        if ($routeName === 'blog.detail') {
            $slug = request()->route('slug');
            $blog = \App\Models\Blog::findBySlug($slug);
            if ($blog) {
                $metaTag = \App\Models\MetaTag::getForModel(\App\Models\Blog::class, $blog->id);
                if ($metaTag) {
                    $metaTags = $metaTag->toMetaArray();
                } else {
                    $metaTags = $blog->getMetaTags();
                }
            } else {
                $metaTags = \App\Models\MetaTag::getDefaults();
            }
        }
        // Check for portfolio detail route
        elseif ($routeName === 'portfolio.detail') {
            $slug = request()->route('slug');
            $portfolio = \App\Models\Portfolio::where('slug', $slug)->first();
            if ($portfolio) {
                $metaTag = \App\Models\MetaTag::getForModel(\App\Models\Portfolio::class, $portfolio->id);
                if ($metaTag) {
                    $metaTags = $metaTag->toMetaArray();
                } else {
                    $metaTags = $portfolio->getMetaTags();
                }
            } else {
                $metaTags = \App\Models\MetaTag::getDefaults();
            }
        }
        // Check for service detail route
        elseif ($routeName === 'service.detail') {
            $slug = request()->route('slug');
            $service = \App\Models\Service::where('slug', $slug)->active()->first();
            if ($service) {
                $metaTag = \App\Models\MetaTag::getForModel(\App\Models\Service::class, $service->id);
                if ($metaTag) {
                    $metaTags = $metaTag->toMetaArray();
                } else {
                    $metaTags = $service->getMetaTags();
                }
            } else {
                $metaTags = \App\Models\MetaTag::getDefaults();
            }
        }
        // Check for static pages
        elseif (in_array($routeName, ['about', 'services', 'portfolio', 'contact'])) {
            $staticPage = \App\Models\StaticPage::where('page_name', $routeName)->first();
            if ($staticPage) {
                $metaTag = \App\Models\MetaTag::getForModel(\App\Models\StaticPage::class, $staticPage->id);
                if ($metaTag) {
                    $metaTags = $metaTag->toMetaArray();
                } else {
                    $metaTags = $staticPage->getMetaTags();
                }
            } else {
                $metaTags = \App\Models\MetaTag::getDefaults();
            }
        }
        // Default meta tags for other routes
        else {
            $metaTags = \App\Models\MetaTag::getDefaults();
        }
    @endphp
    <x-meta-tags :metaTags="$metaTags" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <!-- Font Awesome Icon Css-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="{{ asset('css/mousecursor.css') }}">
    <!-- Main Custom Css -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" media="screen">

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L0CLNY66DG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L0CLNY66DG');
</script>
</head>
<body>

<!-- Preloader Start -->
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon"><img src="{{ asset('images/loader.svg') }}" alt=""></div>
    </div>
</div>
<!-- Preloader End -->
@include('layouts.header')

@yield('content')




@include('layouts.footer')
@yield('pageJS')

