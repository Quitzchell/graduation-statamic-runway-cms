<?php

namespace App\Actions\Blocks\Common;

use App\Actions\Blocks\Interfaces\HasBlockResolver;

class Paragraph implements HasBlockResolver
{
    public function resolveBlock(array $block): array
    {
        return [
            'title' => $block['title'],
            'text' => $block['text'],
        ];
    }
}
