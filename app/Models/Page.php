<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class Page extends Model
{
    use HasRunwayResource;

    protected $table = 'pages';

    protected $fillable = [
        'name',
        'uri',
        'template',
        'blocks'
    ];
}
