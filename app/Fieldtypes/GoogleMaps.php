<?php

namespace App\Fieldtypes;

use Statamic\Fields\Fieldtype;

class GoogleMaps extends Fieldtype
{
    protected $icon = 'pin';

    public function preload(): array
    {

        return [
            'apiKey' => config('services.google_maps.key'),
            'mapId' => config('services.google_maps.map_id'),
        ];
    }

    public function defaultValue()
    {
        return null;
    }

    public function preProcess($data)
    {
        return $data;
    }

    public function process($data)
    {
        return $data;
    }
}
