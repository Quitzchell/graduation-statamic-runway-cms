<?php

namespace App\Actions\Blocks\Common;

use App\Actions\Blocks\Interfaces\HasBlockResolver;
use App\Models\Page;

class CallToAction implements HasBlockResolver
{
    public function resolveBlock(array $block): array
    {
        return [
            'title' => $block['title'],
            'text' => $block['text'],
            'buttonUrl' => $this->resolveRelatedObject($block)->uri(),
            'buttonText' => $block['button_text'],
        ];
    }

    private function resolveRelatedObject($block)
    {
        return match ($block['button_target']) {
            'page' => Page::firstWhere('id', $block['page_id'])
        };
    }
}
