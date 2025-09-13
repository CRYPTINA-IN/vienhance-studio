<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class SeoPage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'slug',
        'featured_image',
        'content',
        'target_keywords',
        'seo_summary',
        'is_active',
        'is_ai_generated',
        'ai_prompt',
        'published_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_ai_generated' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Boot the model and add event listeners
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($seoPage) {
            if (empty($seoPage->slug)) {
                $seoPage->slug = Str::slug($seoPage->title);
            }
        });

        static::created(function ($seoPage) {
            // Create associated meta tag record
            $seoPage->metaTag()->create([
                'taggable_type' => SeoPage::class,
                'taggable_id' => $seoPage->id,
                'title' => $seoPage->title,
                'meta_description' => $seoPage->description,
                'og_title' => $seoPage->title,
                'og_description' => $seoPage->description,
                'og_type' => 'website',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => $seoPage->title,
                'twitter_description' => $seoPage->description,
                'priority' => 0.5,
                'change_frequency' => 'monthly',
                'robots' => 'index, follow',
                'language' => 'en',
                'is_active' => $seoPage->is_active,
            ]);
        });
    }

    /**
     * Get the meta tag for this SEO page
     */
    public function metaTag(): MorphOne
    {
        return $this->morphOne(MetaTag::class, 'taggable');
    }

    /**
     * Scope to get only active pages
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get only published pages
     */
    public function scopePublished($query)
    {
        return $query->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Find page by slug
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)
            ->active()
            ->published()
            ->first();
    }

    /**
     * Get the route key for the model
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the page URL
     */
    public function getUrlAttribute()
    {
        return route('pages.show', $this->slug);
    }

    /**
     * Check if page is published
     */
    public function isPublished()
    {
        return $this->is_active && $this->published_at && $this->published_at <= now();
    }

    /**
     * Get the SEO page's meta tags
     */
    public function getMetaTags()
    {
        // First try to get custom meta tags
        $metaTag = $this->metaTag;
        
        if ($metaTag && $metaTag->is_active) {
            return $metaTag->toMetaArray();
        }
        
        // If no custom meta tags, generate page-specific ones
        return [
            'title' => $this->title . ' - ' . config('app.name'),
            'meta_description' => $this->description ?: substr(strip_tags($this->content), 0, 160) . '...',
            'meta_keywords' => $this->target_keywords ?: strtolower($this->title) . ', web design, development, digital services',
            'og_title' => $this->title,
            'og_description' => $this->description ?: substr(strip_tags($this->content), 0, 160) . '...',
            'og_image' => $this->featured_image ? asset($this->featured_image) : asset('images/logo.svg'),
            'og_type' => 'website',
            'og_url' => url()->current(),
            'og_site_name' => config('app.name'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => $this->title,
            'twitter_description' => $this->description ?: substr(strip_tags($this->content), 0, 160) . '...',
            'twitter_image' => $this->featured_image ? asset($this->featured_image) : asset('images/logo.svg'),
            'twitter_site' => '@vienhancestudio',
            'twitter_creator' => '@vienhancestudio',
            'canonical_url' => url()->current(),
            'schema_markup' => [],
            'priority' => 0.9,
            'change_frequency' => 'weekly',
            'robots' => 'index, follow',
            'author' => config('app.name'),
            'language' => 'en',
        ];
    }
}
