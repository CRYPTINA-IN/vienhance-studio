{{-- SEO Meta Tags Component --}}
{{-- This component automatically generates SEO meta tags based on the route name --}}

@if($routeName)
    {{-- SEO Meta Tags --}}
    {!! \Artesaos\SEOTools\Facades\SEOMeta::generate() !!}
    
    {{-- Open Graph Meta Tags --}}
    {!! \Artesaos\SEOTools\Facades\OpenGraph::generate() !!}
    
    {{-- Twitter Card Meta Tags --}}
    {!! \Artesaos\SEOTools\Facades\TwitterCard::generate() !!}
    
    {{-- JSON-LD Structured Data --}}
    {!! \Artesaos\SEOTools\Facades\JsonLd::generate() !!}
@endif