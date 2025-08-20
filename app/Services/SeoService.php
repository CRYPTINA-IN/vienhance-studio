<?php

namespace App\Services;

use App\Models\StaticPage;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class SeoService
{
    /**
     * Set SEO for a static page
     */
    public static function setSeoForPage($routeName, $customData = [])
    {
        $page = StaticPage::findByRoute($routeName);
        
        if (!$page) {
            self::setDefaultSeo($routeName);
            return;
        }

        // Basic Meta Tags
        SEOMeta::setTitle($page->title);
        SEOMeta::setDescription($page->meta_description);
        SEOMeta::addKeyword($page->meta_keywords);
        SEOMeta::setCanonical($page->canonical_url ?: url()->current());

        // Open Graph (Facebook)
        OpenGraph::setTitle($page->og_title ?: $page->title);
        OpenGraph::setDescription($page->og_description ?: $page->meta_description);
        OpenGraph::setUrl($page->og_url ?: url()->current());
        OpenGraph::setSiteName($page->og_site_name ?: config('app.name'));
        OpenGraph::setType($page->og_type ?: 'website');
        
        if ($page->og_image) {
            OpenGraph::addImage(asset($page->og_image));
        }

        // Twitter Card
        TwitterCard::setTitle($page->twitter_title ?: $page->title);
        TwitterCard::setDescription($page->twitter_description ?: $page->meta_description);
        TwitterCard::setUrl($page->canonical_url ?: url()->current());
        TwitterCard::setType($page->twitter_card ?: 'summary_large_image');
        
        if ($page->twitter_site) {
            TwitterCard::setSite($page->twitter_site);
        }
        
        if ($page->twitter_creator) {
            TwitterCard::addValue('creator', $page->twitter_creator);
        }
        
        if ($page->twitter_image) {
            TwitterCard::addImage(asset($page->twitter_image));
        }
        
        // Set default Twitter site if not set
        if (!$page->twitter_site) {
            TwitterCard::setSite('@vienhancestudio');
        }

        // JSON-LD Structured Data
        if ($page->schema_markup) {
            foreach ($page->schema_markup as $key => $value) {
                JsonLd::addValue($key, $value);
            }
        }

        // Apply custom data if provided
        if (!empty($customData)) {
            self::applyCustomData($customData);
        }
    }

    /**
     * Set default SEO when page is not found
     */
    public static function setDefaultSeo($routeName)
    {
        $defaultTitle = config('app.name') . ' - Professional Web Design & Development Services';
        $defaultDescription = 'Professional web design and development services. We create stunning, responsive websites that drive results for your business.';
        $defaultKeywords = 'web design, web development, digital marketing, responsive design, SEO, Laravel, PHP, modern websites';

        SEOMeta::setTitle($defaultTitle);
        SEOMeta::setDescription($defaultDescription);
        SEOMeta::addKeyword($defaultKeywords);
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setTitle($defaultTitle);
        OpenGraph::setDescription($defaultDescription);
        OpenGraph::setUrl(url()->current());
        OpenGraph::setSiteName(config('app.name'));
        OpenGraph::setType('website');
        OpenGraph::addImage(asset('images/logo.svg'));

        TwitterCard::setTitle($defaultTitle);
        TwitterCard::setDescription($defaultDescription);
        TwitterCard::setUrl(url()->current());
        TwitterCard::setType('summary_large_image');
        TwitterCard::setSite('@vienhancestudio');
        TwitterCard::addValue('creator', '@vienhancestudio');
        TwitterCard::addImage(asset('images/logo.svg'));

        // Default Organization Schema
        JsonLd::addValue('@context', 'https://schema.org');
        JsonLd::addValue('@type', 'Organization');
        JsonLd::addValue('name', config('app.name'));
        JsonLd::addValue('url', url()->current());
        JsonLd::addValue('logo', asset('images/logo.svg'));
        JsonLd::addValue('description', 'Professional web design and development services');
        JsonLd::addValue('sameAs', [
            'https://twitter.com/vienhancestudio',
            'https://facebook.com/vienhancestudio',
            'https://www.linkedin.com/company/vienhance-studio',
            'https://www.instagram.com/vienhancestudio'
        ]);
    }

    /**
     * Set SEO for service detail page
     */
    public static function setSeoForService($service)
    {
        $title = $service['title'] . ' - ' . config('app.name');
        $description = $service['meta_description'] ?? 'Professional ' . strtolower($service['title']) . ' services. We deliver high-quality solutions tailored to your business needs.';
        $keywords = $service['meta_keywords'] ?? strtolower($service['title']) . ', web design, development, digital services';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::addKeyword($keywords);
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl(url()->current());
        OpenGraph::setSiteName(config('app.name'));
        OpenGraph::setType('website');
        
        if (isset($service['image'])) {
            OpenGraph::addImage(asset($service['image']));
        } else {
            OpenGraph::addImage(asset('images/service-image-1.jpg'));
        }

        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);
        TwitterCard::setUrl(url()->current());
        TwitterCard::setType('summary_large_image');
        TwitterCard::setSite('@vienhancestudio');
        TwitterCard::addValue('creator', '@vienhancestudio');
        
        if (isset($service['image'])) {
            TwitterCard::addImage(asset($service['image']));
        } else {
            TwitterCard::addImage(asset('images/service-image-1.jpg'));
        }

        // Service Schema
        JsonLd::addValue('@context', 'https://schema.org');
        JsonLd::addValue('@type', 'Service');
        JsonLd::addValue('name', $service['title']);
        JsonLd::addValue('description', $description);
        JsonLd::addValue('provider', [
            '@type' => 'Organization',
            'name' => config('app.name'),
            'url' => url('/')
        ]);
        JsonLd::addValue('areaServed', 'Worldwide');
        JsonLd::addValue('url', url()->current());
    }

    /**
     * Set SEO for a portfolio
     */
    public static function setSeoForPortfolio($portfolio)
    {
        $title = $portfolio['meta_title'] ?? $portfolio['title'] . ' - Portfolio Project | ' . config('app.name');
        $description = $portfolio['meta_description'] ?? $portfolio['overview'] ?? 'Portfolio project by ' . config('app.name');
        $keywords = $portfolio['meta_keywords'] ?? 'portfolio, web design, web development, ' . strtolower($portfolio['industry'] ?? '');

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::addKeyword($keywords);
        SEOMeta::setCanonical($portfolio['canonical_url'] ?? url()->current());

        OpenGraph::setTitle($portfolio['og_title'] ?? $title);
        OpenGraph::setDescription($portfolio['og_description'] ?? $description);
        OpenGraph::setUrl($portfolio['og_url'] ?? url()->current());
        OpenGraph::setSiteName($portfolio['og_site_name'] ?? config('app.name'));
        OpenGraph::setType($portfolio['og_type'] ?? 'website');
        
        if (isset($portfolio['og_image'])) {
            OpenGraph::addImage(asset($portfolio['og_image']));
        } else if (isset($portfolio['image'])) {
            OpenGraph::addImage(asset($portfolio['image']));
        } else {
            OpenGraph::addImage(asset('images/work-image-1.jpg'));
        }

        TwitterCard::setTitle($portfolio['twitter_title'] ?? $title);
        TwitterCard::setDescription($portfolio['twitter_description'] ?? $description);
        TwitterCard::setUrl(url()->current());
        TwitterCard::setType($portfolio['twitter_card'] ?? 'summary_large_image');
        TwitterCard::setSite($portfolio['twitter_site'] ?? '@vienhancestudio');
        TwitterCard::addValue('creator', $portfolio['twitter_creator'] ?? '@vienhancestudio');
        
        if (isset($portfolio['twitter_image'])) {
            TwitterCard::addImage(asset($portfolio['twitter_image']));
        } else if (isset($portfolio['image'])) {
            TwitterCard::addImage(asset($portfolio['image']));
        } else {
            TwitterCard::addImage(asset('images/work-image-1.jpg'));
        }

        // Portfolio Schema
        JsonLd::addValue('@context', 'https://schema.org');
        JsonLd::addValue('@type', 'CreativeWork');
        JsonLd::addValue('name', $portfolio['title']);
        JsonLd::addValue('description', $description);
        JsonLd::addValue('creator', [
            '@type' => 'Organization',
            'name' => config('app.name'),
            'url' => url('/')
        ]);
        JsonLd::addValue('dateCreated', $portfolio['created_at'] ?? date('Y-m-d'));
        JsonLd::addValue('url', url()->current());
        
        if (isset($portfolio['schema_markup'])) {
            foreach ($portfolio['schema_markup'] as $key => $value) {
                JsonLd::addValue($key, $value);
            }
        }
    }

    /**
     * Apply custom SEO data
     */
    private static function applyCustomData($data)
    {
        if (isset($data['title'])) {
            SEOMeta::setTitle($data['title']);
            OpenGraph::setTitle($data['title']);
            TwitterCard::setTitle($data['title']);
        }

        if (isset($data['description'])) {
            SEOMeta::setDescription($data['description']);
            OpenGraph::setDescription($data['description']);
            TwitterCard::setDescription($data['description']);
        }

        if (isset($data['keywords'])) {
            SEOMeta::addKeyword($data['keywords']);
        }

        if (isset($data['image'])) {
            OpenGraph::addImage(asset($data['image']));
            TwitterCard::addImage(asset($data['image']));
        }

        if (isset($data['canonical'])) {
            SEOMeta::setCanonical($data['canonical']);
            OpenGraph::setUrl($data['canonical']);
            TwitterCard::setUrl($data['canonical']);
        }

        if (isset($data['schema'])) {
            foreach ($data['schema'] as $key => $value) {
                JsonLd::addValue($key, $value);
            }
        }
    }

    /**
     * Generate sitemap data for static pages
     */
    public static function getSitemapData()
    {
        return StaticPage::active()
            ->select(['route_name', 'priority', 'change_frequency', 'updated_at'])
            ->get()
            ->map(function ($page) {
                return [
                    'url' => route($page->route_name),
                    'priority' => $page->priority / 10, // Convert to 0.0-1.0 scale
                    'change_frequency' => $page->change_frequency,
                    'last_modified' => $page->updated_at,
                ];
            });
    }

    /**
     * Get all SEO meta tags as HTML
     */
    public static function getMetaTagsHtml()
    {
        return [
            'meta' => SEOMeta::generate(),
            'open_graph' => OpenGraph::generate(),
            'twitter_card' => TwitterCard::generate(),
            'json_ld' => JsonLd::generate(),
        ];
    }
}
