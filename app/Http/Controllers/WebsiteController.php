<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Services\SeoService;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // Set SEO for home page
        SeoService::setSeoForPage('home');

        $services = Service::active()->ordered()->get();

        $response = [
            'services' => $services,
        ];

        return view('index', ['response' => $response]);
    }

    public function about()
    {
        // Set SEO for about page
        SeoService::setSeoForPage('about');

        $services = Service::active()->ordered()->get();

        $response = [
            'services' => $services,
        ];
        return view('about', ['response' => $response]);
    }

    public function services()
    {
        // Set SEO for services page
        SeoService::setSeoForPage('services');

        $services = Service::active()->ordered()->get();

        $response = [
            'services' => $services,
        ];

        return view('services', ['response' => $response]);
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)
            ->active()
            ->with('description')
            ->first();

        if (!$service) {
            abort(404);
        }

        // Set SEO for service detail page
        SeoService::setSeoForService($service->toArray());

        $services = Service::active()->ordered()->get();

        // Safely get the service description data
        $serviceDescription = null;
        if ($service->relationLoaded('description') && $service->description instanceof \App\Models\ServiceDescription) {
            $serviceDescription = $service->description->toArray();
        }

        $response = [
            'service' => $service->toArray(),
            'service_description' => $serviceDescription,
            'services' => $services,
        ];

        return view('service-detail', ['response' => $response]);
    }

    public function portfolio()
    {
        // Set SEO for portfolio page
        SeoService::setSeoForPage('portfolio');

        $services = Service::active()->ordered()->get();
        $portfolios = Portfolio::published()->with('gallery')->orderBy('created_at', 'desc')->get();

        $response = [
            'services' => $services,
            'portfolios' => $portfolios,
        ];

        return view('portfolio', ['response' => $response]);
    }

    public function portfolioDetail($slug)
    {
        $portfolio = Portfolio::findBySlug($slug);

        if (!$portfolio) {
            abort(404);
        }

        // Set SEO for portfolio detail page
        SeoService::setSeoForPortfolio($portfolio->toArray());

        $services = Service::active()->ordered()->get();

        $response = [
            'portfolio' => $portfolio,
            'services' => $services,
        ];

        return view('portfolio-detail', ['response' => $response]);
    }

    public function contact()
    {
        // Set SEO for contact page
        SeoService::setSeoForPage('contact');

        $services = Service::active()->ordered()->get();

        $response = [
            'services' => $services,
        ];

        return view('contact', ['response' => $response]);
    }
}
