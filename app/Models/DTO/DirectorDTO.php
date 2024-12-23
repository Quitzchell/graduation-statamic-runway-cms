<?php

namespace App\Models\DTO;

use Statamic\Entries\Entry;

class DirectorDTO
{
    public function __construct(
        public ?string $name,
        public ?string $middleName,
        public ?string $surname,
        public ?string $fullName,
        public ?string $dateOfBirth
    ) {}

    public static function make(Entry $director)
    {
        return new self(
            $director['name'],
            $director['middle_name'],
            $director['surname'],
            preg_replace('/\s+/', ' ', $director['title']),
            $director['date_of_birth'],
        );
    }
}
