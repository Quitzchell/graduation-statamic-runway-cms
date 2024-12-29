<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class Review extends Model
{
    use HasRunwayResource;

    protected $table = 'reviews';

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'date',
    ];

    protected $fillable = [
        'reviewable_type',
        'reviewable_id',
        'title',
        'slug',
        'excerpt',
        'image',
        'score',
        'is_published',
        'published_at',
    ];

    /* Relations */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
