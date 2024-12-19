<?php

namespace App\Actions\Blocks\Common;

use App\Actions\Blocks\Interfaces\HasBlockResolver;

class Image implements HasBlockResolver
{
    public function resolveBlock(array $block): array
    {
        return [
            'image' => asset('storage/'.$block['image']),
        ];
    }
}
