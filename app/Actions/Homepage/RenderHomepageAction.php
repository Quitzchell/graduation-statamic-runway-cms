<?php

namespace App\Actions\Homepage;

use App\Actions\Abstracts\TemplateResolver;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class RenderHomepageAction extends TemplateResolver
{
    public function execute(Page $page, ...$params): JsonResponse
    {
        $templateData = $page->template[0];
        $headerItems = [
            'headerImage' => asset('storage/'.$templateData['header_image']),
            'headerTitle' => $templateData['header_title'],
        ];

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blocks' => $this->resolver->execute($templateData['blocks'] ?? []),
        ]);
    }
}
