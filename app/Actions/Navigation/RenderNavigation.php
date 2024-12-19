<?php

namespace App\Actions\Navigation;

use Statamic\Structures\Nav;
use Statamic\Facades\Entry;
use Illuminate\Http\JsonResponse;

class RenderNavigation
{
    public function __invoke(): JsonResponse
    {
        $menuItems = Nav::find('main_menu')->in('default')->tree();

        $pages = [];
        foreach ($menuItems as $item) {
            $entry = Entry::find($item['entry']);

            if ($entry && $entry->template[0]['value'] !== 'homepage') {
                $pages[] = [
                    'name' => $entry->title,
                    'uri' => ltrim($entry->uri(), '/'),
                ];
            }
        }

        return response()->json($pages);
    }
}
