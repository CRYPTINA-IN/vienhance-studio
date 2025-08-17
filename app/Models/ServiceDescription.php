<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceDescription extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'service_id',
        'section_1',
        'section_2',
        'section_3',
        'benefits',
        'process',
        'faqs'
    ];

    protected $casts = [
        'benefits' => 'array',
        'process' => 'array',
        'faqs' => 'array',
        'deleted_at' => 'datetime'
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
