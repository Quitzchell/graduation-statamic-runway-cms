<?php

namespace App\Actions\Blocks\Common;

use App\Actions\Blocks\Interfaces\HasBlockResolver;

class Map implements HasBlockResolver
{
    public function resolveBlock(array $block): array
    {
        return [
            'title' => $block['title'],
            'text' => $block['text'],
            'location' => implode(',', [
                $block['google_maps']['coordinates']['lat'],
                $block['google_maps']['coordinates']['lng'],
            ]),
            'mapKey' => config('services.google_maps.key'),
        ];
    }
}
