<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\StaticPage;
use App\Services\SeoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap
     */
    public function index()
    {
        $sitemap = app('sitemap');

        // Add static pages
        $staticPages = StaticPage::active()->get();
        foreach ($staticPages as $page) {
            $sitemap->add(
                route($page->route_name),
                $page->updated_at,
                $page->priority / 10, // Convert to 0.0-1.0 scale
                $page->change_frequency
            );
        }

        // Add service pages
        $services = Service::active()->get();
        foreach ($services as $service) {
            $sitemap->add(
                route('service.detail', $service->slug),
                $service->updated_at,
                0.8,
                'weekly'
            );
        }

        return $sitemap->render('xml');
    }

    /**
     * Generate robots.txt
     */
    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";
        
        return response($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
