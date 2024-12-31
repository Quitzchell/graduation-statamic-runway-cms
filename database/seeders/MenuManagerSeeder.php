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

        MenuManager::first()->update([
            'menu_items' => json_encode([
                [
                    "id" => "m5cfwlvu",
                    "type" => "menu_structure",
                    "enabled" => true,
                    "page_id" => 2
                ], [
                    "id" => "m5cfwqln",
                    "type" => "menu_structure",
                    "enabled" => true, "page_id" => 3
                ]
            ])
        ]);
    }
}
