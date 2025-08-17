<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

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
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'og_url',
        'og_site_name',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'twitter_site',
        'twitter_creator',
        'canonical_url',
        'schema_markup',
        'priority',
        'change_frequency',
        'status'
    ];

    protected $casts = [
        'schema_markup' => 'array',
        'priority' => 'decimal:2'
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
}
