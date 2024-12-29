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
        'published' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'image',
        'category_id',
        'published_at',
        'published',
    ];

    /* Relations */

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
