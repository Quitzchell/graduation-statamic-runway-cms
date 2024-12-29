<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    public function run(): void
    {
        $actors = [
            [
                'name' => 'Joaquin',
                'surname' => 'Phoenix',
                'date_of_birth' => '1974-10-28',
            ],
            [
                'name' => 'Vanessa',
                'surname' => 'Kirby',
                'date_of_birth' => '1988-04-18',
            ],
            [
                'name' => 'Tahar',
                'surname' => 'Rahim',
                'date_of_birth' => '1981-07-04',
            ],
            [
                'name' => 'Philippe',
                'surname' => 'Torreton',
                'date_of_birth' => '1965-10-13',
            ],
            [
                'name' => 'Richard',
                'middle_name' => 'E.',
                'surname' => 'Grant',
                'date_of_birth' => '1957-05-05',
            ],
            [
                'name' => 'Jay',
                'surname' => 'Rodan',
                'date_of_birth' => '1974-05-15',
            ],
            [
                'name' => 'Rod',
                'surname' => 'Steiger',
                'date_of_birth' => '1925-04-14',
            ],
            [
                'name' => 'Orson',
                'surname' => 'Welles',
                'date_of_birth' => '1915-05-06',
            ],
            [
                'name' => 'Christopher',
                'surname' => 'Plummer',
                'date_of_birth' => '1929-12-13',
            ],
        ];

        foreach ($actors as $actor) {
            Actor::create($actor);
        }
    }
}
