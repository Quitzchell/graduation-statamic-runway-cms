<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class MenuManager extends Model
{
    use HasRunwayResource;

    protected $table = 'menu_manager';

    protected $fillable = [
        'menu_id',
        'page_id',
        'parent_id',
        'sort',
    ];

    /* Relations */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
