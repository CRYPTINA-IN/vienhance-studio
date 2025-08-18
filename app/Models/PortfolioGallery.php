<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'portfolio_id',
        'image',
        'alt_text',
        'caption',
        'sort_order'
    ];

    /**
     * Set the image attribute with proper directory path.
     */
    public function setImageAttribute($value)
    {
        if ($value && !str_starts_with($value, 'uploads/')) {
            $this->attributes['image'] = 'uploads/portfolio-gallery/' . $value;
        } else {
            $this->attributes['image'] = $value;
        }
    }

    /**
     * Get the portfolio that owns the gallery image.
     */
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
