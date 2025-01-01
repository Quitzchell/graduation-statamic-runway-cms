<?php

declare(strict_types=1);

namespace App\Actions\Abstracts;

use App\Actions\Blocks\BlockResolverManager;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

abstract class TemplateResolver
{
    public function __construct(protected readonly BlockResolverManager $resolver) {}

    abstract public function execute(Page $page): JsonResponse;

    protected function render(Page $page, array $data = []): JsonResponse
    {
        return response()->json(array_merge([
            '_template' => strtolower($page->template[0]['type']),
            'meta' => [
                'title' => null,
                'description' => null,
            ],
        ], $data));

    }
}
