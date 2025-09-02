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
        return $this->getMetaTagsArray();
    }
}
