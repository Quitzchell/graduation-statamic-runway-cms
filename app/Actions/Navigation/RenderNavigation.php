<?php

namespace App\Actions\Navigation;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class RenderNavigation
{
    public function __invoke(): JsonResponse
    {
        $navigation = Menu::find(1)
            ->items
            ->flatmap(fn ($item) => collect($item->menu_items)
                ->map(fn ($menuItem) => Page::find($menuItem['page_id']))
                ->map(fn ($page) => [
                    'name' => $page->name,
                    'uri' => $page->uri(),
                ])
            )->values();

        return response()->json($navigation);
    }
}
