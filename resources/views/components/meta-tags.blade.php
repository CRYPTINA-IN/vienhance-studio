@props(['metaTags' => null])

@php
    // Get meta tags from component props, then from shared view data, then defaults
    $metaTags = $metaTags ?? \App\Models\MetaTag::getDefaults();
@endphp

{{-- Basic Meta Tags --}}
<title>{{ $metaTags['title'] ?? config('app.name') }}</title>
<meta name="description" content="{{ $metaTags['meta_description'] ?? '' }}">
<meta name="keywords" content="{{ $metaTags['meta_keywords'] ?? '' }}">
<meta name="author" content="{{ $metaTags['author'] ?? config('app.name') }}">
<meta name="robots" content="{{ $metaTags['robots'] ?? 'index, follow' }}">
<meta name="language" content="{{ $metaTags['language'] ?? 'en' }}">

{{-- Canonical URL --}}
@if(!empty($metaTags['canonical_url']))
    <link rel="canonical" href="{{ $metaTags['canonical_url'] }}">
@endif

{{-- Open Graph Meta Tags --}}
<meta property="og:title" content="{{ $metaTags['og_title'] ?? $metaTags['title'] ?? config('app.name') }}">
<meta property="og:description" content="{{ $metaTags['og_description'] ?? $metaTags['meta_description'] ?? '' }}">
<meta property="og:image" content="{{ $metaTags['og_image'] ?? asset('images/logo.svg') }}">
<meta property="og:type" content="{{ $metaTags['og_type'] ?? 'website' }}">
<meta property="og:url" content="{{ $metaTags['og_url'] ?? url()->current() }}">
<meta property="og:site_name" content="{{ $metaTags['og_site_name'] ?? config('app.name') }}">

{{-- Twitter Card Meta Tags --}}
<meta name="twitter:card" content="{{ $metaTags['twitter_card'] ?? 'summary_large_image' }}">
<meta name="twitter:title" content="{{ $metaTags['twitter_title'] ?? $metaTags['title'] ?? config('app.name') }}">
<meta name="twitter:description" content="{{ $metaTags['twitter_description'] ?? $metaTags['meta_description'] ?? '' }}">
<meta name="twitter:image" content="{{ $metaTags['twitter_image'] ?? asset('images/logo.svg') }}">
@if(!empty($metaTags['twitter_site']))
    <meta name="twitter:site" content="{{ $metaTags['twitter_site'] }}">
@endif
@if(!empty($metaTags['twitter_creator']))
    <meta name="twitter:creator" content="{{ $metaTags['twitter_creator'] }}">
@endif

{{-- Geographic Meta Tags --}}
@if(!empty($metaTags['geo_region']))
    <meta name="geo.region" content="{{ $metaTags['geo_region'] }}">
@endif
@if(!empty($metaTags['geo_placename']))
    <meta name="geo.placename" content="{{ $metaTags['geo_placename'] }}">
@endif
@if(!empty($metaTags['geo_position']))
    <meta name="geo.position" content="{{ $metaTags['geo_position'] }}">
@endif
@if(!empty($metaTags['icbm']))
    <meta name="ICBM" content="{{ $metaTags['icbm'] }}">
@endif

{{-- Schema Markup --}}
@if(!empty($metaTags['schema_markup']))
    <script type="application/ld+json">
        {!! json_encode($metaTags['schema_markup']) !!}
    </script>
@endif

{{-- Additional Meta Tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
