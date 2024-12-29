<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Napoleon',
                'release_year' => 2023,
                'description' => 'An epic that details the chequered rise and fall of French Emperor Napoleon Bonaparte and his relentless journey to power through the prism of his addictive, volatile relationship with his wife, Josephine.',
                'trailer_url' => 'https://www.youtube.com/watch?v=OAZWXUkrjPc',
            ],
            [
                'title' => 'Monsieur N.',
                'release_year' => 2003,
                'description' => 'How could Napoleon, the man of war and pioneering military strategist, meekly accept being locked up on a storm-lashed rock in the middle of the Atlantic ocean? What system of defence, and thus of attack, can he dream up to loosen his jailers\' grip? On Saint Helena, the far-flung island chosen by his enemies, Napoleon fights a mysterious battle, his last and most important, and one that history has kept secret all these years.',
            ],
            [
                'title' => 'Waterloo',
                'release_year' => 1970,
                'description' => 'Facing the decline of everything he has worked to obtain, conqueror Napoleon Bonaparte and his army confront the British at the Battle of Waterloo.',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
