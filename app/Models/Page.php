<?php

namespace App\Models;

use App\Models\Interfaces\HasUrl;
use Illuminate\Database\Eloquent\Model;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class Page extends Model implements hasUrl
{
    use HasRunwayResource;

    protected $table = 'pages';

    protected $casts = [
        'template' => 'array',
    ];

    protected $fillable = [
        'name',
        'uri',
        'template',
        'blocks',
    ];

    /* HasUrl */
    public function uri($lang = null): string
    {
        return strtolower($this->name);
    }

    public function url($lang = null): string
    {
        return url($this->uri($lang));
    }
}
