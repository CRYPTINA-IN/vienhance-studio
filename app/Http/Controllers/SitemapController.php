<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Blog;
use App\Models\SeoPage;
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

        // Add blog listing page
        $sitemap->add(Url::create(route('blog'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.7));

        // Add individual blog posts
        $blogs = Blog::published()->get();
        foreach ($blogs as $blog) {
            $sitemap->add(Url::create(route('blog.detail', $blog->slug))
                ->setLastModificationDate($blog->updated_at ?? $blog->published_at ?? now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.6));
        }

        // Add published SEO pages
        $seoPages = SeoPage::published()->get();
        foreach ($seoPages as $seoPage) {
            $sitemap->add(Url::create(route('pages.show', $seoPage->slug))
                ->setLastModificationDate($seoPage->updated_at ?? $seoPage->published_at ?? now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.5));
        }

        return $sitemap->toResponse(request());
    }

    /**
     * Generate robots.txt
     */
    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /login/\n";
        $content .= "Disallow: /register/\n";
        $content .= "Disallow: /cart/\n";
        $content .= "Disallow: /checkout/\n";
        $content .= "Disallow: /user/\n";
        $content .= "Disallow: /dashboard/\n";
        $content .= "Disallow: /config/\n";
        $content .= "Disallow: /storage/\n";
        $content .= "Disallow: /vendor/\n";
        $content .= "Disallow: /cgi-bin/\n\n";
        $content .= "Allow: /\n\n";
        $content .= 'Sitemap: '.url('/sitemap.xml')."\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
