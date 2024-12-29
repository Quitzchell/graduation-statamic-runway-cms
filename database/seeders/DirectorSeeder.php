<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    public function run(): void
    {
        $directors = [
            [
                'name' => 'Ridley',
                'surname' => 'Scott',
                'date_of_birth' => '1937-11-30',
            ],
            [
                'name' => 'Antoine',
                'middle_name' => 'de',
                'surname' => 'Caunes',
                'date_of_birth' => '1953-01-12',
            ],
            [
                'name' => 'Sergey',
                'surname' => 'Bondarchuk',
                'date_of_birth' => '1920-10-20',
            ],
        ];

        foreach ($directors as $director) {
            Director::create($director);
        }
    }
}
