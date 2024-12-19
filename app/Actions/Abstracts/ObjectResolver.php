<?php

declare(strict_types=1);

namespace App\Actions\Abstracts;

use App\Actions\Blocks\BlockResolverManager;
use Illuminate\Http\JsonResponse;

abstract class ObjectResolver
{
    public function __construct(protected readonly BlockResolverManager $resolver) {}

    abstract public function execute(array $segments): JsonResponse;

    protected function render($class, array $data = []): JsonResponse
    {
        return response()->json(array_merge([
            '_object' => strtolower(class_basename($class)),
        ], $data));
    }
}
