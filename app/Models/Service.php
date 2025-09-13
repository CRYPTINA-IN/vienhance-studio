<?php

namespace App\Models;

use App\Models\Traits\HasMetaTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasMetaTags, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'link',
        'delay',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'deleted_at' => 'datetime',
    ];

    public function description(): HasOne
    {
        return $this->hasOne(ServiceDescription::class);
    }

    /**
     * Scope to get only active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Get the service's meta tags
     */
    public function getMetaTags()
    {
        // First try to get custom meta tags
        $metaTags = $this->getMetaTagsArray();
        
        // If we got defaults (no custom meta tags), generate service-specific ones
        if ($metaTags['title'] === config('app.name')) {
            return [
                'title' => $this->title . ' - ' . config('app.name'),
                'meta_description' => $this->description ?: 'Professional ' . strtolower($this->title) . ' services by ' . config('app.name'),
                'meta_keywords' => strtolower($this->title) . ', web design, development, digital services, ' . config('app.name'),
                'og_title' => $this->title,
                'og_description' => $this->description ?: 'Professional ' . strtolower($this->title) . ' services by ' . config('app.name'),
                'og_image' => $this->image ? asset($this->image) : asset('images/logo.svg'),
                'og_type' => 'website',
                'og_url' => url()->current(),
                'og_site_name' => config('app.name'),
                'twitter_card' => 'summary_large_image',
                'twitter_title' => $this->title,
                'twitter_description' => $this->description ?: 'Professional ' . strtolower($this->title) . ' services by ' . config('app.name'),
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
