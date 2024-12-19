<?php

declare(strict_types=1);

namespace App\Actions\Abstracts;

use App\Actions\Blocks\BlockResolverManager;
use Illuminate\Http\JsonResponse;
use Statamic\Entries\Entry;

abstract class TemplateResolver
{
    public function __construct(protected readonly BlockResolverManager $resolver) {}

    abstract public function execute(Entry $page): JsonResponse;

    protected function render(Entry $page, array $data = []): JsonResponse
    {
        return response()->json(array_merge([
            '_template' => strtolower($page->get('template')),
            'meta' => [
                'title' => null,
                'description' => null,
            ],
        ], $data));

    }
}
