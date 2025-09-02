<?php

namespace App\Models;

use App\Models\Traits\HasMetaTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory, HasMetaTags;

    protected $fillable = [
        'page_name',
        'route_name',
        'title',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'schema_markup' => 'array',
    ];

    /**
     * Scope to get only active pages
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get page by route name
     */
    public static function findByRoute($routeName)
    {
        return static::where('route_name', $routeName)->active()->first();
    }

    /**
     * Get page by page name
     */
    public static function findByPageName($pageName)
    {
        return static::where('page_name', $pageName)->active()->first();
    }

    /**
     * Get default SEO data if page not found
     */
    public static function getDefaultSeo($routeName)
    {
        $page = static::findByRoute($routeName);

        if (! $page) {
            return [
                'title' => config('app.name'),
                'meta_description' => 'Professional web design and development services',
                'meta_keywords' => 'web design, development, digital services',
                'og_title' => config('app.name'),
                'og_description' => 'Professional web design and development services',
                'og_image' => asset('images/logo.svg'),
                'og_type' => 'website',
                'og_url' => url()->current(),
                'og_site_name' => config('app.name'),
                'twitter_card' => 'summary_large_image',
                'twitter_title' => config('app.name'),
                'twitter_description' => 'Professional web design and development services',
                'twitter_image' => asset('images/logo.svg'),
                'twitter_site' => '@yourcompany',
                'twitter_creator' => '@yourcompany',
                'canonical_url' => url()->current(),
            ];
        }

        return $page->toArray();
    }

    /**
     * Get all meta tags as array
     */
    public function getMetaTags()
    {
        return $this->getMetaTagsArray();
    }
}
