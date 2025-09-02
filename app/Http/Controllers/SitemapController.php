<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap
     */
    public function index()
    {
        $sitemap = Sitemap::create();

        // Add main pages
        $sitemap->add(Url::create(route('home'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(1.0));

        $sitemap->add(Url::create(route('about'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8));

        $sitemap->add(Url::create(route('services'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9));

        $sitemap->add(Url::create(route('portfolio'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9));

        $sitemap->add(Url::create(route('contact'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.7));

        // Add service pages
        $services = Service::active()->get();
        foreach ($services as $service) {
            $sitemap->add(Url::create(route('service.detail', $service->slug))
                ->setLastModificationDate($service->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        }

        // Add portfolio pages
        $portfolios = Portfolio::published()->get();
        foreach ($portfolios as $portfolio) {
            $sitemap->add(Url::create(route('portfolio.detail', $portfolio->slug))
                ->setLastModificationDate($portfolio->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.7));
        }

        return $sitemap->toResponse(request());
    }

    /**
     * Generate robots.txt
     */
    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n\n";
        $content .= 'Sitemap: '.url('/sitemap.xml')."\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
