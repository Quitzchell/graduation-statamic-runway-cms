<?php

namespace App\Actions\Homepage;

use App\Actions\Abstracts\TemplateResolver;
use Illuminate\Http\JsonResponse;
use Statamic\Entries\Entry;

class RenderHomepageAction extends TemplateResolver
{
    public function execute(Entry $page, ...$params): JsonResponse
    {
        $headerItems = [
            'headerImage' => asset('storage/'.$page->value('header_image')),
            'headerTitle' => $page->get('header_title'),
        ];

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blocks' => $this->resolver->execute($page->value('blocks')),
        ]);
    }
}
