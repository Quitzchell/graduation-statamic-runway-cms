<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class MenuManager extends Model
{
    use HasRunwayResource;

    protected $table = 'menu_manager';

    protected $fillable = [
        'menu_id',
        'menu_items'
    ];

    /* Relations */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    /* Assessors */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->menu->name
        );
    }

    /* Searchable */
    public function scopeRunwaySearch($query, $searchQuery)
    {
        return $query->whereHas('menu', function ($q) use ($searchQuery) {
            $q->where('name', 'like', '%' . $searchQuery . '%');
        });
    }
}
