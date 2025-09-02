<?php

namespace App\Models;

use App\Models\Traits\HasMetaTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, HasMetaTags, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author_id',
        'status',
        'published_at',
        'reading_time',
        'view_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'reading_time' => 'integer',
        'view_count' => 'integer',
    ];

    /**
     * Get the author of the blog post.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the tags for the blog post.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_tag');
    }

    /**
     * Scope a query to only include published blog posts.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include draft blog posts.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope a query to only include featured blog posts.
     */
    public function scopeFeatured($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now())
            ->orderBy('view_count', 'desc');
    }

    /**
     * Scope a query to get recent blog posts.
     */
    public function scopeRecent($query, $limit = 6)
    {
        return $query->published()->orderBy('published_at', 'desc')->limit($limit);
    }

    /**
     * Get the blog post by slug.
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)
            ->with(['author', 'tags'])
            ->published()
            ->first();
    }

    /**
     * Increment view count
     */
    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    /**
     * Calculate reading time based on content length
     */
    public function calculateReadingTime()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $this->reading_time = ceil($wordCount / 200); // Average reading speed: 200 words per minute
        $this->save();
    }

    /**
     * Get formatted published date
     */
    public function getFormattedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M, Y') : 'Not published';
    }

    /**
     * Get the blog post's meta tags
     */
    public function getMetaTags()
    {
        return $this->getMetaTagsArray();
    }

    /**
     * Get related blog posts
     */
    public function getRelatedPosts($limit = 3)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
