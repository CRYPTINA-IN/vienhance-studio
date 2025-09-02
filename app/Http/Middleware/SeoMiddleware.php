<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use App\Models\MetaTag;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\StaticPage;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SeoMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Only process HTML responses
        if (! $response->headers->get('content-type') ||
            ! str_contains($response->headers->get('content-type'), 'text/html')) {
            return $response;
        }

        // Meta tags are now handled directly in the layout
        // This middleware can be used for other SEO-related functionality in the future

        return $response;
    }

    /**
     * Get meta tags based on current route
     */
    protected function getMetaTags(Request $request): array
    {
        $routeName = $request->route()->getName();
        $path = $request->path();

        Log::info('SEO Middleware - Route: '.$routeName.', Path: '.$path);

        // Check for specific model routes
        if ($this->isBlogDetailRoute($request)) {
            Log::info('SEO Middleware - Detected blog detail route');

            return $this->getBlogMetaTags($request);
        }

        if ($this->isPortfolioDetailRoute($request)) {
            return $this->getPortfolioMetaTags($request);
        }

        if ($this->isServiceDetailRoute($request)) {
            return $this->getServiceMetaTags($request);
        }

        // Check for static pages
        $staticPage = StaticPage::findByRoute($routeName);
        if ($staticPage) {
            return $this->getStaticPageMetaTags($staticPage);
        }

        Log::info('SEO Middleware - Using default meta tags for route: '.$routeName);

        // Return default meta tags
        return $this->getDefaultMetaTags($routeName);
    }

    /**
     * Check if current route is blog detail
     */
    protected function isBlogDetailRoute(Request $request): bool
    {
        return $request->route()->getName() === 'blog.detail';
    }

    /**
     * Check if current route is portfolio detail
     */
    protected function isPortfolioDetailRoute(Request $request): bool
    {
        return $request->route()->getName() === 'portfolio.detail';
    }

    /**
     * Check if current route is service detail
     */
    protected function isServiceDetailRoute(Request $request): bool
    {
        return $request->route()->getName() === 'service.detail';
    }

    /**
     * Get blog meta tags
     */
    protected function getBlogMetaTags(Request $request): array
    {
        $slug = $request->route('slug');
        $blog = Blog::findBySlug($slug);

        Log::info('SEO Middleware - Blog lookup: slug='.$slug.', blog found='.($blog ? 'yes' : 'no'));

        if (! $blog) {
            Log::info('SEO Middleware - Blog not found, returning defaults');

            return MetaTag::getDefaults();
        }

        Log::info('SEO Middleware - Blog found: ID='.$blog->id.', Title='.$blog->title);

        // Try to get custom meta tags first
        $metaTag = MetaTag::getForModel(Blog::class, $blog->id);
        if ($metaTag) {
            Log::info('SEO Middleware - Meta tag found in centralized table: '.$metaTag->title);

            return $metaTag->toMetaArray();
        }

        Log::info('SEO Middleware - No meta tag in centralized table, using blog defaults');

        // Fallback to blog's built-in meta tags
        return $blog->getMetaTags();
    }

    /**
     * Get portfolio meta tags
     */
    protected function getPortfolioMetaTags(Request $request): array
    {
        $slug = $request->route('slug');
        $portfolio = Portfolio::where('slug', $slug)->first();

        if (! $portfolio) {
            return MetaTag::getDefaults();
        }

        // Try to get custom meta tags first
        $metaTag = MetaTag::getForModel(Portfolio::class, $portfolio->id);
        if ($metaTag) {
            return $metaTag->toMetaArray();
        }

        // Fallback to portfolio's built-in meta tags
        return [
            'title' => $portfolio->meta_title ?: $portfolio->title,
            'meta_description' => $portfolio->meta_description,
            'meta_keywords' => $portfolio->meta_keywords,
            'og_title' => $portfolio->og_title ?: $portfolio->title,
            'og_description' => $portfolio->og_description ?: $portfolio->meta_description,
            'og_image' => $portfolio->og_image ?: $portfolio->image,
            'og_type' => $portfolio->og_type ?: 'article',
            'og_url' => $portfolio->og_url ?: url()->current(),
            'og_site_name' => $portfolio->og_site_name ?: config('app.name'),
            'twitter_card' => $portfolio->twitter_card ?: 'summary_large_image',
            'twitter_title' => $portfolio->twitter_title ?: $portfolio->title,
            'twitter_description' => $portfolio->twitter_description ?: $portfolio->meta_description,
            'twitter_image' => $portfolio->twitter_image ?: $portfolio->image,
            'twitter_site' => $portfolio->twitter_site,
            'twitter_creator' => $portfolio->twitter_creator,
            'canonical_url' => $portfolio->canonical_url ?: url()->current(),
            'schema_markup' => $portfolio->schema_markup,
        ];
    }

    /**
     * Get service meta tags
     */
    protected function getServiceMetaTags(Request $request): array
    {
        $slug = $request->route('slug');
        $service = Service::where('slug', $slug)->active()->first();

        if (! $service) {
            return MetaTag::getDefaults();
        }

        // Try to get custom meta tags
        $metaTag = MetaTag::getForModel(Service::class, $service->id);
        if ($metaTag) {
            return $metaTag->toMetaArray();
        }

        // Fallback to default service meta tags
        return [
            'title' => $service->title.' - '.config('app.name'),
            'meta_description' => $service->description,
            'meta_keywords' => 'web design, development, '.strtolower($service->title),
            'og_title' => $service->title,
            'og_description' => $service->description,
            'og_image' => $service->image,
            'og_type' => 'website',
            'og_url' => url()->current(),
            'og_site_name' => config('app.name'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => $service->title,
            'twitter_description' => $service->description,
            'twitter_image' => $service->image,
            'canonical_url' => url()->current(),
        ];
    }

    /**
     * Get static page meta tags
     */
    protected function getStaticPageMetaTags(StaticPage $page): array
    {
        // Try to get custom meta tags first
        $metaTag = MetaTag::getForModel(StaticPage::class, $page->id);
        if ($metaTag) {
            return $metaTag->toMetaArray();
        }

        // Fallback to static page's built-in meta tags
        return $page->getMetaTags();
    }

    /**
     * Get default meta tags for route
     */
    protected function getDefaultMetaTags(string $routeName): array
    {
        $defaults = MetaTag::getDefaults();

        // Customize based on route
        switch ($routeName) {
            case 'home':
                $defaults['title'] = 'Home - '.config('app.name');
                $defaults['meta_description'] = 'Welcome to '.config('app.name').' - Professional web design and development services';
                break;
            case 'about':
                $defaults['title'] = 'About Us - '.config('app.name');
                $defaults['meta_description'] = 'Learn about '.config('app.name').' and our team of web design and development experts';
                break;
            case 'services':
                $defaults['title'] = 'Our Services - '.config('app.name');
                $defaults['meta_description'] = 'Explore our comprehensive web design and development services';
                break;
            case 'portfolio':
                $defaults['title'] = 'Our Portfolio - '.config('app.name');
                $defaults['meta_description'] = 'View our latest web design and development projects';
                break;
            case 'blog':
                $defaults['title'] = 'Blog - '.config('app.name');
                $defaults['meta_description'] = 'Read our latest insights on web design, development, and digital trends';
                break;
            case 'contact':
                $defaults['title'] = 'Contact Us - '.config('app.name');
                $defaults['meta_description'] = 'Get in touch with '.config('app.name').' for your web design and development needs';
                break;
        }

        return $defaults;
    }
}
