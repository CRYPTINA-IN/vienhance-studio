<?php

namespace App\Models;

use App\Models\Traits\HasMetaTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, HasMetaTags, SoftDeletes;

    protected $fillable = [
        'title',
        'client',
        'industry',
        'overview',
        'about_project',
        'image',
        'slug',
        'short_description',
        'testimonial',
        'status',
    ];

    protected $casts = [
        // No casts needed after removing SEO fields
    ];

    /**
     * Get the gallery images for the portfolio.
     */
    public function gallery()
    {
        return $this->hasMany(PortfolioGallery::class)->orderBy('sort_order');
    }

    /**
     * Scope a query to only include live portfolios.
     */
    public function scopeLive($query)
    {
        return $query->where('status', 'live');
    }

    /**
     * Scope a query to only include in-development portfolios.
     */
    public function scopeInDevelopment($query)
    {
        return $query->where('status', 'in-development');
    }

    /**
     * Scope a query to only include recurring portfolios.
     */
    public function scopeRecurring($query)
    {
        return $query->where('status', 'recurring');
    }

    /**
     * Scope a query to only include published portfolios.
     */
    public function scopePublished($query)
    {
        return $query->whereIn('status', ['live', 'recurring']);
    }

    /**
     * Get the portfolio by slug.
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->with('gallery')->first();
    }

    /**
     * Get the portfolio's meta tags
     */
    public function getMetaTags()
    {
        // First try to get custom meta tags
        $metaTags = $this->getMetaTagsArray();
        
        // If we got defaults (no custom meta tags), generate portfolio-specific ones
        if ($metaTags['title'] === config('app.name')) {
            return [
                'title' => $this->title . ' - ' . config('app.name'),
                'meta_description' => $this->short_description ?: $this->overview ?: 'Professional portfolio project by ' . config('app.name'),
                'meta_keywords' => 'portfolio, ' . strtolower($this->industry ?? 'web design') . ', ' . strtolower($this->title),
                'og_title' => $this->title,
                'og_description' => $this->short_description ?: $this->overview ?: 'Professional portfolio project by ' . config('app.name'),
                'og_image' => $this->image ? asset($this->image) : asset('images/logo.svg'),
                'og_type' => 'article',
                'og_url' => url()->current(),
                'og_site_name' => config('app.name'),
                'twitter_card' => 'summary_large_image',
                'twitter_title' => $this->title,
                'twitter_description' => $this->short_description ?: $this->overview ?: 'Professional portfolio project by ' . config('app.name'),
                'twitter_image' => $this->image ? asset($this->image) : asset('images/logo.svg'),
                'twitter_site' => '@vienhancestudio',
                'twitter_creator' => '@vienhancestudio',
                'canonical_url' => url()->current(),
                'schema_markup' => [],
                'priority' => 0.8,
                'change_frequency' => 'monthly',
                'robots' => 'index, follow',
                'author' => config('app.name'),
                'language' => 'en',
            ];
        }
        
        return $metaTags;
    }
}
