<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class Book extends Model
{
    use HasRunwayResource;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'slug',
        'published_year',
        'description',
    ];

    /* Relations */
    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
