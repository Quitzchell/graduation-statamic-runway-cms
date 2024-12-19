<?php

namespace App\Actions\Blocks;

use App\Actions\Blocks\Interfaces\HasBlockResolver;
use App\Models\DTO\BlockData;

class BlockResolverManager
{
    public function execute(array $blocks): array
    {
        return array_map([$this, 'resolveBlock'], $blocks);
    }

    private function resolveBlock(array $block): BlockData
    {
        if (! isset($block['namespace'], $block['type'])) {
            throw new \InvalidArgumentException('The block must contain both "namespace" and "type" keys.');
        }

        $blockName = sprintf('%s\%s', ucfirst($block['namespace']), $this->snakeToPascalCase($block['type']));
        $blockClass = "App\\Actions\\Blocks\\$blockName";

        if (! class_exists($blockClass)) {
            throw new \RuntimeException("The block class $blockClass does not exist.");
        }

        if (! is_subclass_of($blockClass, HasBlockResolver::class)) {
            throw new \LogicException("The block class $blockClass must implement the HasBlockResolver interface.");
        }

        $resolvedData = (new $blockClass)->resolveBlock($block);

        return new BlockData($blockName, '', $resolvedData);
    }

    private function snakeToPascalCase(string $type): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));
    }
}
