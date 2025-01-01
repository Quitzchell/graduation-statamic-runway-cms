<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class BlogPost extends Model
{
    use HasRunwayResource;

    protected $table = 'blog_posts';

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'date',
        'blocks' => 'array',
    ];

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'image',
        'category_id',
        'published_at',
        'is_published',
        'blocks',
    ];

    /* Relations */

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
