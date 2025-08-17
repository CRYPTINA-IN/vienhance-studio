<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use App\Models\PortfolioGallery;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'Stellar Tech Solutions',
                'client' => 'Cameron Williamson',
                'industry' => 'Technology',
                'overview' => 'Stellar Tech Solutions is a leading provider of innovative technology services designed to empower businesses in today\'s fast-paced digital landscape. We specialize in crafting customized IT solutions, integrating cutting-edge technologies, and delivering robust cybersecurity strategies to ensure your organization\'s growth, efficiency, and security.',
                'about_project' => 'Our team of experienced professionals is dedicated to understanding your unique challenges and goals, offering tailored services that align with your vision. From seamless system integration and managed IT services to advanced cloud solutions and proactive cybersecurity measures, we help businesses streamline operations, enhance productivity, and safeguard critical data.',
                'image' => 'work-image-1.jpg',
                'slug' => 'stellar-tech-solutions',
                'short_description' => 'We redesigned Stellar Tech\'s website to enhance their digital presence and improve user experience.',
                'testimonial' => 'The team at Vienhance Studio delivered an exceptional website that perfectly captures our brand identity and exceeds our expectations. The attention to detail and user experience is outstanding.',
                'meta_title' => 'Stellar Tech Solutions - Web Design Project | Vienhance Studio',
                'meta_description' => 'See how we redesigned Stellar Tech Solutions\' website to enhance their digital presence and improve user experience.',
                'meta_keywords' => 'web design, branding, tech company, responsive design, user experience',
                'og_title' => 'Stellar Tech Solutions - Web Design Project',
                'og_description' => 'See how we redesigned Stellar Tech Solutions\' website to enhance their digital presence and improve user experience.',
                'og_image' => 'work-image-1.jpg',
                'og_type' => 'website',
                'og_url' => 'https://vienhance-studio.com/portfolio/stellar-tech-solutions',
                'og_site_name' => 'Vienhance Studio',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Stellar Tech Solutions - Web Design Project',
                'twitter_description' => 'See how we redesigned Stellar Tech Solutions\' website to enhance their digital presence and improve user experience.',
                'twitter_image' => 'work-image-1.jpg',
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => 'https://vienhance-studio.com/portfolio/stellar-tech-solutions',
                'schema_markup' => [
                    '@context' => 'https://schema.org',
                    '@type' => 'CreativeWork',
                    'name' => 'Stellar Tech Solutions Website',
                    'description' => 'Professional web design and development for Stellar Tech Solutions',
                    'creator' => [
                        '@type' => 'Organization',
                        'name' => 'Vienhance Studio'
                    ],
                    'dateCreated' => '2023-01-25',
                    'url' => 'https://vienhance-studio.com/portfolio/stellar-tech-solutions'
                ],
                'priority' => 0.8,
                'change_frequency' => 'monthly',
                'status' => 'live',
                'gallery' => [
                    ['image' => 'post-4.jpg', 'alt_text' => 'Stellar Tech Solutions Homepage', 'caption' => 'Homepage Design', 'sort_order' => 1],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Stellar Tech Solutions Dashboard', 'caption' => 'Dashboard Interface', 'sort_order' => 2],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Stellar Tech Solutions Mobile', 'caption' => 'Mobile Responsive Design', 'sort_order' => 3],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Stellar Tech Solutions Admin', 'caption' => 'Admin Panel', 'sort_order' => 4],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Stellar Tech Solutions Analytics', 'caption' => 'Analytics Dashboard', 'sort_order' => 5],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Stellar Tech Solutions Features', 'caption' => 'Key Features', 'sort_order' => 6],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Stellar Tech Solutions Integration', 'caption' => 'System Integration', 'sort_order' => 7],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Stellar Tech Solutions Final', 'caption' => 'Final Implementation', 'sort_order' => 8],
                ]
            ],
            [
                'title' => 'Green Wave Foods',
                'client' => 'Sarah Johnson',
                'industry' => 'Food & Beverage',
                'overview' => 'Green Wave Foods needed a modern, user-friendly e-commerce platform that could handle their growing customer base while maintaining the organic, sustainable brand image they\'ve built.',
                'about_project' => 'Creating an intuitive shopping experience that reflects the company\'s commitment to sustainability while ensuring fast loading times and mobile responsiveness. The platform needed to showcase their organic products effectively while providing a seamless checkout process.',
                'image' => 'work-image-2.jpg',
                'slug' => 'green-wave-foods',
                'short_description' => 'We built a user-friendly Shopping platform for Green Wave Foods.',
                'testimonial' => 'The e-commerce platform Vienhance Studio created for us has significantly increased our online sales. The user experience is intuitive and the mobile responsiveness is perfect.',
                'meta_title' => 'Green Wave Foods - E-commerce Platform | Vienhance Studio',
                'meta_description' => 'Modern e-commerce platform for Green Wave Foods with mobile-first design and sustainable branding.',
                'meta_keywords' => 'e-commerce, food platform, mobile design, sustainable branding, online shopping',
                'og_title' => 'Green Wave Foods - E-commerce Platform',
                'og_description' => 'Modern e-commerce platform for Green Wave Foods with mobile-first design and sustainable branding.',
                'og_image' => 'work-image-2.jpg',
                'og_type' => 'website',
                'og_url' => 'https://vienhance-studio.com/portfolio/green-wave-foods',
                'og_site_name' => 'Vienhance Studio',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Green Wave Foods - E-commerce Platform',
                'twitter_description' => 'Modern e-commerce platform for Green Wave Foods with mobile-first design and sustainable branding.',
                'twitter_image' => 'work-image-2.jpg',
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => 'https://vienhance-studio.com/portfolio/green-wave-foods',
                'schema_markup' => [
                    '@context' => 'https://schema.org',
                    '@type' => 'CreativeWork',
                    'name' => 'Green Wave Foods E-commerce Platform',
                    'description' => 'Modern e-commerce platform for organic food products',
                    'creator' => [
                        '@type' => 'Organization',
                        'name' => 'Vienhance Studio'
                    ],
                    'dateCreated' => '2023-03-15',
                    'url' => 'https://vienhance-studio.com/portfolio/green-wave-foods'
                ],
                'priority' => 0.8,
                'change_frequency' => 'monthly',
                'status' => 'live',
                'gallery' => [
                    ['image' => 'post-4.jpg', 'alt_text' => 'Green Wave Foods Homepage', 'caption' => 'Homepage Design', 'sort_order' => 1],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Green Wave Foods Products', 'caption' => 'Product Catalog', 'sort_order' => 2],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Green Wave Foods Cart', 'caption' => 'Shopping Cart', 'sort_order' => 3],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Green Wave Foods Checkout', 'caption' => 'Checkout Process', 'sort_order' => 4],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Green Wave Foods Mobile', 'caption' => 'Mobile Experience', 'sort_order' => 5],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Green Wave Foods Admin', 'caption' => 'Admin Dashboard', 'sort_order' => 6],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Green Wave Foods Analytics', 'caption' => 'Sales Analytics', 'sort_order' => 7],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Green Wave Foods Final', 'caption' => 'Final Platform', 'sort_order' => 8],
                ]
            ],
            [
                'title' => 'Horizon Real Estate',
                'client' => 'Michael Chen',
                'industry' => 'Real Estate',
                'overview' => 'Horizon Real Estate required a complete brand identity overhaul to establish themselves as a trusted name in the competitive real estate market.',
                'about_project' => 'Developing a brand identity that conveys trust, professionalism, and local expertise while standing out in a crowded market. The project included logo design, brand guidelines, and marketing materials.',
                'image' => 'work-image-3.jpg',
                'slug' => 'horizon-real-estate',
                'short_description' => 'We helped Horizon Real Estate establish a trusted brand identity.',
                'testimonial' => 'Vienhance Studio transformed our brand identity completely. The new logo and design system perfectly represents our values and has helped us stand out in the competitive real estate market.',
                'meta_title' => 'Horizon Real Estate - Brand Identity Design | Vienhance Studio',
                'meta_description' => 'Complete brand identity overhaul for Horizon Real Estate including logo design and marketing materials.',
                'meta_keywords' => 'brand identity, logo design, real estate, marketing materials, brand guidelines',
                'og_title' => 'Horizon Real Estate - Brand Identity Design',
                'og_description' => 'Complete brand identity overhaul for Horizon Real Estate including logo design and marketing materials.',
                'og_image' => 'work-image-3.jpg',
                'og_type' => 'website',
                'og_url' => 'https://vienhance-studio.com/portfolio/horizon-real-estate',
                'og_site_name' => 'Vienhance Studio',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Horizon Real Estate - Brand Identity Design',
                'twitter_description' => 'Complete brand identity overhaul for Horizon Real Estate including logo design and marketing materials.',
                'twitter_image' => 'work-image-3.jpg',
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => 'https://vienhance-studio.com/portfolio/horizon-real-estate',
                'schema_markup' => [
                    '@context' => 'https://schema.org',
                    '@type' => 'CreativeWork',
                    'name' => 'Horizon Real Estate Brand Identity',
                    'description' => 'Complete brand identity design for real estate company',
                    'creator' => [
                        '@type' => 'Organization',
                        'name' => 'Vienhance Studio'
                    ],
                    'dateCreated' => '2023-02-10',
                    'url' => 'https://vienhance-studio.com/portfolio/horizon-real-estate'
                ],
                'priority' => 0.8,
                'change_frequency' => 'monthly',
                'status' => 'live',
                'gallery' => [
                    ['image' => 'post-4.jpg', 'alt_text' => 'Horizon Real Estate Logo', 'caption' => 'Logo Design', 'sort_order' => 1],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Horizon Real Estate Brand', 'caption' => 'Brand Guidelines', 'sort_order' => 2],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Horizon Real Estate Business Cards', 'caption' => 'Business Cards', 'sort_order' => 3],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Horizon Real Estate Brochures', 'caption' => 'Marketing Brochures', 'sort_order' => 4],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Horizon Real Estate Website', 'caption' => 'Website Design', 'sort_order' => 5],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Horizon Real Estate Social Media', 'caption' => 'Social Media Assets', 'sort_order' => 6],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Horizon Real Estate Signage', 'caption' => 'Office Signage', 'sort_order' => 7],
                    ['image' => 'post-4.jpg', 'alt_text' => 'Horizon Real Estate Final', 'caption' => 'Final Brand Package', 'sort_order' => 8],
                ]
            ]
        ];

        foreach ($portfolios as $portfolioData) {
            $gallery = $portfolioData['gallery'];
            unset($portfolioData['gallery']);
            
            $portfolio = Portfolio::create($portfolioData);
            
            foreach ($gallery as $galleryItem) {
                $portfolio->gallery()->create($galleryItem);
            }
        }
    }
}
