<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasMetaTags;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes, HasMetaTags;

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
        'status'
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
}
