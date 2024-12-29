<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class Director extends Model
{
    use HasRunwayResource;

    protected $table = 'directors';

    protected $appends = ['full_name'];

    protected $fillable = [
        'name',
        'middle_name',
        'surname',
        'date_of_birth',
    ];

    /* Relations */
    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }

    /* Accessors */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return implode(' ', array_filter([
                    $this->name,
                    $this->middle_name,
                    $this->surname,
                ]));
            }
        );
    }
}
