<?php

namespace App\Models\DTO;

use Statamic\Entries\Entry;

class ActorDTO
{
    public function __construct(
        public ?string $name,
        public ?string $middleName,
        public ?string $surname,
        public ?string $fullName,
        public ?string $dateOfBirth
    ) {}

    public static function make(Entry $actor)
    {
        return new self(
            $actor['name'],
            $actor['middle_name'],
            $actor['surname'],
            preg_replace('/\s+/', ' ', $actor['title']),
            $actor['date_of_birth'],
        );
    }
}
