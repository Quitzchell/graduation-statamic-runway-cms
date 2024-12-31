<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuManager;
use Illuminate\Database\Seeder;

class MenuManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = Menu::all();

        foreach ($menus as $menu) {
            MenuManager::create([
               'menu_id' => $menu->getKey(),
            ]);
        }
    }
}
