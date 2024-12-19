<?php

namespace App\Http\Controllers;

use App\Actions\Homepage\RenderHomepageAction;
use App\Dictionaries\Templates;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use InvalidArgumentException;
use Statamic\Entries\Entry;

class ContentController
{
    public function __construct(private Templates $templates) {}

    public function getIndex(Request $request, $uri = null)
    {
        $uri = ($uri === '/' || $uri === null) ? 'home' : $uri;

        $segments = explode('/', $uri);

        $page = Entry::query()
            ->where('collection', 'pages')
            ->where('slug', $segments[0])
            ->first();

        if (! $page) {
            abort(404);
        }

        try {
            $template = $page->get('template');
            $method = $this->resolveMethodForTemplate($template);

            return App::call([$this, $method], ['page' => $page, 'segments' => $segments]);
        } catch (\InvalidArgumentException $e) {
            abort(404, 'Template not found');
        }
    }

    private function resolveMethodForTemplate(string $template): string
    {
        $options = $this->templates->options();

        // If the template is valid, return its method
        if (array_key_exists($template, $options)) {
            return $this->templates->get($template)->extra()['method'];
        }

        // Throw an exception if the template is invalid
        throw new InvalidArgumentException('Invalid template');
    }

    public function getHomepage(
        Entry $page,
        RenderHomepageAction $action
    ): JsonResponse {
        return $action->execute($page);
    }
}
