<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MetaTag extends Model
{
    protected $fillable = [
        'taggable_type',
        'taggable_id',
        'title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
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
        'schema_markup',
        'priority',
        'change_frequency',
        'robots',
        'author',
        'language',
        'geo_region',
        'geo_placename',
        'geo_position',
        'icbm',
        'is_active',
    ];

    protected $casts = [
        'schema_markup' => 'array',
        'priority' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the parent taggable model.
     */
    public function taggable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scope to get only active meta tags
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get meta tags by model type and ID
     */
    public static function getForModel($modelType, $modelId)
    {
        return static::where('taggable_type', $modelType)
                    ->where('taggable_id', $modelId)
                    ->active()
                    ->first();
    }

    /**
     * Get all meta tags as array for view
     */
    public function toMetaArray()
    {
        return [
            'title' => $this->title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'canonical_url' => $this->canonical_url,
            'og_title' => $this->og_title,
            'og_description' => $this->og_description,
            'og_image' => $this->og_image,
            'og_type' => $this->og_type,
            'og_url' => $this->og_url,
            'og_site_name' => $this->og_site_name,
            'twitter_card' => $this->twitter_card,
            'twitter_title' => $this->twitter_title,
            'twitter_description' => $this->twitter_description,
            'twitter_image' => $this->twitter_image,
            'twitter_site' => $this->twitter_site,
            'twitter_creator' => $this->twitter_creator,
            'schema_markup' => $this->schema_markup,
            'priority' => $this->priority,
            'change_frequency' => $this->change_frequency,
            'robots' => $this->robots,
            'author' => $this->author,
            'language' => $this->language,
            'geo_region' => $this->geo_region,
            'geo_placename' => $this->geo_placename,
            'geo_position' => $this->geo_position,
            'icbm' => $this->icbm,
        ];
    }

    /**
     * Get default meta tags
     */
    public static function getDefaults()
    {
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
            'schema_markup' => [],
            'priority' => 0.5,
            'change_frequency' => 'monthly',
            'robots' => 'index, follow',
            'author' => config('app.name'),
            'language' => 'en',
        ];
    }
}
