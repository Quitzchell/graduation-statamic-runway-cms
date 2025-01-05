<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class Movie extends Model
{
    use HasRunwayResource;

    protected $table = 'movies';

    protected $fillable = [
        'director_id',
        'title',
        'slug',
        'release_year',
        'description',
        'trailer_id',
    ];

    /* Relations */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class)->orderBy('sort_order');
    }

    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }

    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
