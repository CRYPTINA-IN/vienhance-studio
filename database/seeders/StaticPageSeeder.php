<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StaticPage;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'page_name' => 'home',
                'route_name' => 'home',
                'title' => 'Vienhance Studio - Professional Web Design & Development Services',
                'meta_description' => 'Vienhance Studio offers professional web design, development, and digital marketing services. We create stunning, responsive websites that drive results for your business.',
                'meta_keywords' => 'web design, web development, digital marketing, responsive design, SEO, Laravel, PHP, modern websites',
                'og_title' => 'Vienhance Studio - Professional Web Design & Development',
                'og_description' => 'Transform your business with our professional web design and development services. We create stunning, responsive websites that drive results.',
                'og_image' => '/images/logo.svg',
                'og_type' => 'website',
                'og_url' => 'https://vienhancestudio.com',
                'og_site_name' => 'Vienhance Studio',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Vienhance Studio - Professional Web Design & Development',
                'twitter_description' => 'Transform your business with our professional web design and development services. We create stunning, responsive websites that drive results.',
                'twitter_image' => '/images/logo.svg',
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => 'https://vienhancestudio.com',
                'schema_markup' => '{"@context":"https://schema.org","@type":"Organization","name":"Vienhance Studio","url":"https://vienhancestudio.com","logo":"https://vienhancestudio.com/images/logo.svg","description":"Professional web design and development services","sameAs":["https://twitter.com/vienhancestudio","https://facebook.com/vienhancestudio","https://linkedin.com/company/vienhance-studio"]}',
                'priority' => 1,
                'change_frequency' => 'weekly',
            ],
            [
                'page_name' => 'about',
                'route_name' => 'about',
                'title' => 'About Us - Vienhance Studio | Our Story & Mission',
                'meta_description' => 'Learn about Vienhance Studio\'s journey, our team of experts, and our mission to deliver exceptional web design and development solutions.',
                'meta_keywords' => 'about us, web design company, development team, digital agency, our story, mission',
                'og_title' => 'About Vienhance Studio - Our Story & Mission',
                'og_description' => 'Discover our journey and mission to deliver exceptional web design and development solutions that transform businesses.',
                'og_image' => '/images/about-img.jpg',
                'og_type' => 'website',
                'og_url' => 'https://vienhancestudio.com/about',
                'og_site_name' => 'Vienhance Studio',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'About Vienhance Studio - Our Story & Mission',
                'twitter_description' => 'Discover our journey and mission to deliver exceptional web design and development solutions that transform businesses.',
                'twitter_image' => '/images/about-img.jpg',
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => 'https://vienhancestudio.com/about',
                'schema_markup' => '{"@context":"https://schema.org","@type":"AboutPage","name":"About Vienhance Studio","description":"Learn about our journey and mission to deliver exceptional web design and development solutions.","url":"https://vienhancestudio.com/about"}',
                'priority' => 1,
                'change_frequency' => 'monthly',
            ],
            [
                'page_name' => 'services',
                'route_name' => 'services',
                'title' => 'Our Services - Web Design, Development & Digital Marketing | Vienhance Studio',
                'meta_description' => 'Explore our comprehensive range of digital services including web design, development, SEO, and digital marketing solutions tailored for your business.',
                'meta_keywords' => 'web design services, web development, SEO services, digital marketing, e-commerce, custom websites',
                'og_title' => 'Our Services - Web Design, Development & Digital Marketing',
                'og_description' => 'Comprehensive digital services including web design, development, SEO, and digital marketing solutions for your business.',
                'og_image' => '/images/service-image-1.jpg',
                'og_type' => 'website',
                'og_url' => 'https://vienhancestudio.com/services',
                'og_site_name' => 'Vienhance Studio',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Our Services - Web Design, Development & Digital Marketing',
                'twitter_description' => 'Comprehensive digital services including web design, development, SEO, and digital marketing solutions for your business.',
                'twitter_image' => '/images/service-image-1.jpg',
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => 'https://vienhancestudio.com/services',
                'schema_markup' => '{"@context":"https://schema.org","@type":"Service","name":"Web Design and Development Services","description":"Comprehensive digital services including web design, development, SEO, and digital marketing solutions.","provider":{"@type":"Organization","name":"Vienhance Studio"},"areaServed":"Worldwide","url":"https://vienhancestudio.com/services"}',
                'priority' => 1,
                'change_frequency' => 'weekly',
            ],
            [
                'page_name' => 'portfolio',
                'route_name' => 'portfolio',
                'title' => 'Our Portfolio - Web Design & Development Projects | Vienhance Studio',
                'meta_description' => 'Browse our impressive portfolio of web design and development projects. See how we\'ve helped businesses achieve their digital goals.',
                'meta_keywords' => 'portfolio, web design projects, development projects, case studies, client work, examples',
                'og_title' => 'Our Portfolio - Web Design & Development Projects',
                'og_description' => 'Browse our impressive portfolio of web design and development projects. See how we\'ve helped businesses achieve their digital goals.',
                'og_image' => '/images/work-image-1.jpg',
                'og_type' => 'website',
                'og_url' => 'https://vienhancestudio.com/portfolio',
                'og_site_name' => 'Vienhance Studio',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Our Portfolio - Web Design & Development Projects',
                'twitter_description' => 'Browse our impressive portfolio of web design and development projects. See how we\'ve helped businesses achieve their digital goals.',
                'twitter_image' => '/images/work-image-1.jpg',
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => 'https://vienhancestudio.com/portfolio',
                'schema_markup' => '{"@context":"https://schema.org","@type":"CreativeWork","name":"Portfolio","description":"Our collection of web design and development projects","creator":{"@type":"Organization","name":"Vienhance Studio"},"url":"https://vienhancestudio.com/portfolio"}',
                'priority' => 1,
                'change_frequency' => 'weekly',
            ],
            [
                'page_name' => 'contact',
                'route_name' => 'contact',
                'title' => 'Contact Us - Get In Touch | Vienhance Studio',
                'meta_description' => 'Ready to start your project? Contact Vienhance Studio today. We\'re here to discuss your web design and development needs.',
                'meta_keywords' => 'contact us, get quote, web design quote, development services, consultation',
                'og_title' => 'Contact Us - Get In Touch | Vienhance Studio',
                'og_description' => 'Ready to start your project? Contact us today to discuss your web design and development needs.',
                'og_image' => '/images/contact-circle.png',
                'og_type' => 'website',
                'og_url' => 'https://vienhancestudio.com/contact',
                'og_site_name' => 'Vienhance Studio',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Contact Us - Get In Touch | Vienhance Studio',
                'twitter_description' => 'Ready to start your project? Contact us today to discuss your web design and development needs.',
                'twitter_image' => '/images/contact-circle.png',
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => 'https://vienhancestudio.com/contact',
                'schema_markup' => '{"@context":"https://schema.org","@type":"ContactPage","name":"Contact Vienhance Studio","description":"Get in touch with us to discuss your web design and development needs","url":"https://vienhancestudio.com/contact","mainEntity":{"@type":"Organization","name":"Vienhance Studio","contactPoint":{"@type":"ContactPoint","contactType":"customer service","availableLanguage":"English"}}}',
                'priority' => 1,
                'change_frequency' => 'monthly',
            ]
        ];

        foreach ($pages as $pageData) {
            StaticPage::create($pageData);
        }
    }
}
