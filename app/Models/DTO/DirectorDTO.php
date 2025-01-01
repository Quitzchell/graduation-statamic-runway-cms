<?php

namespace App\Models\DTO;

use App\Models\Director;

class DirectorDTO
{
    public function __construct(
        public ?string $name,
        public ?string $middleName,
        public ?string $surname,
        public ?string $fullName,
        public ?string $dateOfBirth
    ) {}

    public static function make(Director $director)
    {
        return new self(
            $director->name,
            $director->middle_name,
            $director->surname,
            $director->full_name,
            $director->date_of_birth,
        );
    }
}
