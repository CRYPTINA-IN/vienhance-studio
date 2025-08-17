<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    {!! \Artesaos\SEOTools\Facades\SEOMeta::generate() !!}
    
    <!-- Open Graph Meta Tags -->
    {!! \Artesaos\SEOTools\Facades\OpenGraph::generate() !!}
    
    <!-- Twitter Card Meta Tags -->
    {!! \Artesaos\SEOTools\Facades\TwitterCard::generate() !!}
    
    <!-- JSON-LD Structured Data -->
    {!! \Artesaos\SEOTools\Facades\JsonLd::generate() !!}
    
    <title>SEO Test Page</title>
</head>
<body>
    <h1>SEO Test Page</h1>
    <p>This page is used to test the SEO implementation.</p>
    
    <h2>Generated Meta Tags:</h2>
    <pre>
    <!-- SEO Meta Tags -->
    {!! \Artesaos\SEOTools\Facades\SEOMeta::generate() !!}
    
    <!-- Open Graph Meta Tags -->
    {!! \Artesaos\SEOTools\Facades\OpenGraph::generate() !!}
    
    <!-- Twitter Card Meta Tags -->
    {!! \Artesaos\SEOTools\Facades\TwitterCard::generate() !!}
    
    <!-- JSON-LD Structured Data -->
    {!! \Artesaos\SEOTools\Facades\JsonLd::generate() !!}
    </pre>
</body>
</html>
