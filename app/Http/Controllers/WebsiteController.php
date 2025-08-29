<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Contact;
use App\Models\Blog;
use App\Services\SeoService;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // Set SEO for home page
        SeoService::setSeoForPage('home');

        $services = Service::active()->ordered()->get();
        $portfolios = Portfolio::published()->with('gallery')->orderBy('created_at', 'desc')->take(3)->get();

        $response = [
            'services' => $services,
            'portfolios' => $portfolios,
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

    public function portfolio(Request $request)
    {
        // Set SEO for portfolio page
        SeoService::setSeoForPage('portfolio');

        $services = Service::active()->ordered()->get();
        $portfolios = Portfolio::published()
            ->with('gallery')
            ->orderBy('created_at', 'desc')
            ->paginate(9); // Show 9 portfolios per page (3x3 grid)

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

    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|regex:/^[6-9]\d{9}$/',
            'message' => 'required|string|max:1000',
        ], [
            'phone.regex' => 'Mobile number must be exactly 10 digits starting with 6, 7, 8, or 9.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        try {
            // Check if email already exists and message is unread
            $existingContact = Contact::where('email', $validated['email'])
                ->where('is_read', false)
                ->first();

            if ($existingContact) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'One of our representatives will get back to you shortly. Please wait for our response.'
                ], 422);
            }

            // Add IP address to the validated data
            $validated['ip_address'] = $request->ip();
            
            // Save to database
            Contact::create($validated);
            
            // Here you can add logic to:
            // 1. Send email notification
            // 2. Log the contact request
            
            // You can implement email sending using Laravel's Mail facade
            // Example:
            // Mail::to('your-email@example.com')->send(new ContactFormMail($validated));
            
            return response()->json(['status' => 'success', 'message' => 'Message sent successfully!']);
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to send message. Please try again.'], 500);
        }
    }

    public function blog()
    {
        // Set SEO for blog page
        SeoService::setSeoForPage('blog');
        
        $blogs = Blog::published()->with(['author', 'tags'])->orderBy('published_at', 'desc')->paginate(6);
        $services = Service::active()->ordered()->get();

        $response = [
            'blogs' => $blogs,
            'services' => $services,
        ];

        return view('blog', ['response' => $response]);
    }

    public function blogDetail($slug)
    {
        $blog = Blog::findBySlug($slug);
        
        if (!$blog) {
            abort(404);
        }

        // Increment view count
        $blog->incrementViewCount();

        $services = Service::active()->ordered()->get();
        $relatedPosts = $blog->getRelatedPosts(3);

        $response = [
            'blog' => $blog,
            'services' => $services,
            'relatedPosts' => $relatedPosts,
        ];

        return view('blog-detail', ['response' => $response]);
    }


}
