<?php

namespace App\Http\Controllers;

use App\Actions\Blog\RenderBlogDetailAction;
use App\Actions\Blog\RenderBlogOverviewAction;
use App\Actions\Homepage\RenderHomepageAction;
use App\Actions\Review\RenderReviewDetailAction;
use App\Actions\Review\RenderReviewOverviewAction;
use App\Dictionaries\Templates;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use InvalidArgumentException;

readonly class ContentController
{
    public function __construct(private Templates $templates) {}

    public function getIndex(Request $request, $uri = null)
    {
        $uri = ($uri === '/' || $uri === null) ? 'home' : $uri;

        $segments = explode('/', $uri);

        $page = Page::query()
            ->where('slug', $segments[0])
            ->first();

        if (! $page) {
            abort(404);
        }
        try {
            $templateData = $page->template[0];
            $template = $templateData['type'];
            $method = $this->resolveMethodForTemplate($template);

            return App::call([$this, $method], ['page' => $page, 'segments' => $segments]);
        } catch (\InvalidArgumentException $e) {
            abort(404, 'Template not found');
        }
    }

    private function resolveMethodForTemplate(string $template): string
    {
        $options = $this->templates->options();
        if (array_key_exists($template, $options)) {
            return $this->templates->get($template)->extra()['method'];
        }

        throw new InvalidArgumentException('Invalid template');
    }

    public function getHomepage(
        Page $page,
        RenderHomepageAction $action
    ): JsonResponse {
        return $action->execute($page);
    }

    public function getBlog(
        Page $page,
        array $segments,
        RenderBlogOverviewAction $overviewAction,
        RenderBlogDetailAction $detailAction
    ): JsonResponse {
        if (count($segments) === 1) {
            return $overviewAction->execute($page);
        }

        return $detailAction->execute($segments);
    }

    public function getReview(
        Page $page,
        array $segments,
        RenderReviewDetailAction $detailAction,
        RenderReviewOverviewAction $overviewAction
    ): JsonResponse {
        if (count($segments) === 1) {
            return $overviewAction->execute($page);
        }

        return $detailAction->execute($segments);
    }
}
