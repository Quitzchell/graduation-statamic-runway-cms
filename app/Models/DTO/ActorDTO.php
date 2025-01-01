<?php

namespace App\Models\DTO;

use App\Models\Actor;

class ActorDTO
{
    public function __construct(
        public ?string $name,
        public ?string $middleName,
        public ?string $surname,
        public ?string $fullName,
        public ?string $dateOfBirth
    ) {}

    public static function make(Actor $actor)
    {
        return new self(
            $actor->name,
            $actor->middle_name,
            $actor->surname,
            $actor->full_name,
            $actor->date_of_birth,
        );
    }
}
