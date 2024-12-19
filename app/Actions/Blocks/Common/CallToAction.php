<?php

namespace App\Actions\Blocks\Common;

use App\Actions\Blocks\Interfaces\HasBlockResolver;
use Statamic\Entries\Entry;

class CallToAction implements HasBlockResolver
{
    public function resolveBlock(array $block): array
    {
        $relatedEntry = Entry::find($block['urlable_id']);

        return [
            'title' => $block['title'],
            'text' => $block['text'],
            'buttonUrl' => $relatedEntry->uri(),
            'buttonText' => $block['button_text'],
        ];
    }
}
