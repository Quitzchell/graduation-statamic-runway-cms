<?php

namespace App\Models\Pivots;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ActorMovie extends Pivot
{
    protected $table = 'actor_movie';

    public $timestamps = false;

    /* Relations */
    public function actor(): BelongsTo
    {
        return $this->belongsTo(Actor::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
