<?php

namespace App\Actions\Navigation;

use Illuminate\Http\JsonResponse;
use Statamic\Facades\Entry;
use Statamic\Structures\Nav;

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
