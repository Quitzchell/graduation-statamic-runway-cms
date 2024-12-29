<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class Category extends Model
{
    use HasRunwayResource;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    /* Relations */
    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }
}
