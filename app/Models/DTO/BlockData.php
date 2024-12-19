<?php

namespace App\Models\DTO;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

final readonly class BlockData implements Arrayable, JsonSerializable
{
    public function __construct(
        private string $template,
        private string $identifier,
        private array $data,
    ) {}

    public function toArray(): array
    {
        return [
            '_template' => $this->template,
            '_identifier' => $this->identifier,
            'data' => $this->data,
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
