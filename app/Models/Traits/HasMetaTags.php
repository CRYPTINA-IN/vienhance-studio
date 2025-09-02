<?php

namespace App\Models\Traits;

use App\Models\MetaTag;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasMetaTags
{
    /**
     * Get the model's meta tags.
     */
    public function metaTags(): MorphOne
    {
        return $this->morphOne(MetaTag::class, 'taggable');
    }

    /**
     * Get or create meta tags for this model
     */
    public function getOrCreateMetaTags(): MetaTag
    {
        return $this->metaTags()->firstOrCreate([
            'taggable_type' => static::class,
            'taggable_id' => $this->id,
        ], MetaTag::getDefaults());
    }

    /**
     * Update meta tags for this model
     */
    public function updateMetaTags(array $data): bool
    {
        $metaTags = $this->getOrCreateMetaTags();

        return $metaTags->update($data);
    }

    /**
     * Get meta tags as array
     */
    public function getMetaTagsArray(): array
    {
        $metaTags = $this->metaTags()->active()->first();

        if (! $metaTags) {
            return MetaTag::getDefaults();
        }

        return $metaTags->toMetaArray();
    }

    /**
     * Delete meta tags for this model
     */
    public function deleteMetaTags(): bool
    {
        return $this->metaTags()->delete();
    }

    /**
     * Boot the trait
     */
    protected static function bootHasMetaTags()
    {
        static::deleted(function ($model) {
            $model->deleteMetaTags();
        });
    }
}
