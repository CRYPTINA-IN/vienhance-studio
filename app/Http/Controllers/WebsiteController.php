<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();

        $response = [
            'services' => $services,
        ];

        return view('index', ['response' => $response]);
    }

    public function about()
    {
        $services = Service::active()->ordered()->get();

        $response = [
            'services' => $services,
        ];
        return view('about', ['response' => $response]);
    }

    public function services()
    {
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
        $services = Service::active()->ordered()->get();

        $response = [
            'services' => $services,
        ];

        return view('portfolio', ['response' => $response]);
    }

    public function contact()
    {
        $services = Service::active()->ordered()->get();

        $response = [
            'services' => $services,
        ];

        return view('contact', ['response' => $response]);
    }
}
