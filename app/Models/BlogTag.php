<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogTag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the blog posts for the tag.
     */
    public function blogPosts(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class, 'blog_tag');
    }

    /**
     * Scope to get only active tags
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
     * Get tag by slug
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->active()->first();
    }

    /**
     * Get posts count for this tag
     */
    public function getPostsCountAttribute()
    {
        return $this->blogPosts()->published()->count();
    }

    /**
     * Get popular tags
     */
    public static function getPopularTags($limit = 10)
    {
        return static::active()
                    ->withCount(['blogPosts' => function($query) {
                        $query->published();
                    }])
                    ->orderBy('blog_posts_count', 'desc')
                    ->limit($limit)
                    ->get();
    }
}
