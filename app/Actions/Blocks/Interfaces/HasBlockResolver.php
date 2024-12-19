<?php

namespace App\Actions\Blocks\Interfaces;

interface HasBlockResolver
{
    public function resolveBlock(array $block): array;
}
