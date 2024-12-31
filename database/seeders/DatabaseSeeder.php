<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MenuManager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BlogPostSeeder::class,
            ActorSeeder::class,
            MovieSeeder::class,
            DirectorSeeder::class,
            MovieRelationSeeder::class,
            ReviewSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
            MenuManagerSeeder::class
        ]);
    }
}
